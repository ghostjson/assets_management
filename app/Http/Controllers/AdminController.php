<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Requests\CreateAssetRequest;
use App\Http\Requests\CreateAssignRequest;
use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\EditAssetRequest;
use App\Http\Requests\EditEmployeeRequest;
use App\Models\Asset;
use App\Models\Assign;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use League\Csv\CannotInsertRecord;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(AdminAuthMiddleware::class);
    }

    public function dashboardView()
    {
        $pending_tickets = Ticket::where('status', 'processing')->orderBy('created_at', 'desc')->get();
        $tickets = Ticket::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact(['pending_tickets', 'tickets']));
    }

    public function assetView(Asset $asset)
    {
        return view('admin.asset', compact('asset'));
    }

    public function assetsView()
    {
        $assets = Asset::all();
        return view('admin.assets', compact('assets'));
    }

    public function assetsCreateView()
    {
        return view('admin.create_assets');
    }

    public function assetsEditView(Asset $asset)
    {
        return view('admin.edit_assets', compact('asset'));
    }

    public function assetsCreate(CreateAssetRequest $request)
    {
        Asset::create($request->validated());
        return redirect('admin/assets')->with('message', 'Successfully created asset');
    }

    public function assetsEdit(EditAssetRequest $request, Asset $asset)
    {
        $asset->update($request->validated());
        return redirect('admin/assets')->with('message', 'Successfully updated asset');
    }

    public function assetsDelete(Asset $asset)
    {
        try {
            $asset->delete();
            return redirect('admin/assets')->with('message', 'Successfully deleted asset');
        } catch (\Exception $e) {
            return redirect('admin/assets')->with('error', 'Error during asset deletion');
        }
    }

    public function assetsDownload()
    {
        $assets = Asset::all();
        $attributes = ['name', 'type', 'number', 'serial_number', 'mac_id', 'memory', 'storage', 'amount'];

        $csvExport = new \Laracsv\Export();

        try {
            $csvExport->build($assets, $attributes)->download();
        } catch (CannotInsertRecord $e) {
            return redirect()->back()->withErrors('error', 'error inserting csv');
        }

    }


    public function employeesView()
    {
        $employees = User::all();
        return view('admin.employees', compact('employees'));
    }

    public function employeeView(User $user)
    {
        $assigned_assets = Assign::getAssetsOf($user->id);
        return view('admin.employee', compact(['user', 'assigned_assets']));
    }

    public function employeesCreateView()
    {
        $roles = Role::all();
        return view('admin.create_employees', compact('roles'));
    }

    public function employeesCreate(CreateEmployeeRequest $request)
    {
        User::create($request->validated());
        return redirect('admin/employees')->with('message', 'Successfully created employee');
    }

    public function employeesEditView(User $user)
    {
        $roles = Role::all();
        return view('admin.edit_employees', compact(['user', 'roles']));
    }

    public function employeesEdit(EditEmployeeRequest $request, User $user)
    {
        $user->update($request->validated());
        return redirect('admin/employees')->with('message', 'Successfully updated employees');
    }

    public function employeesDelete(User $user)
    {
        try {
            $user->delete();
            return redirect('admin/employees')->with('message', 'Successfully deleted employee');
        } catch (\Exception $e) {
            return redirect('admin/employees')->with('error', 'Error during employee deletion');
        }
    }


    public function ticketView(Ticket $ticket)
    {
        $assets = Assign::getAssetsOf($ticket->employee_id);
        return view('admin.ticket', compact(['ticket', 'assets']));
    }

    public function ticketAssign(Ticket $ticket, User $user)
    {
        $assigned_assets = Assign::getAssetsOf($user->id);
        $assets = Asset::where('status', 'unassigned')->get();
        return view('admin.ticket_assign', compact(['user', 'ticket', 'assets', 'assigned_assets']));
    }

    public function assignAsset(Asset $asset, User $user)
    {
        $asset->status = 'assigned';
        $asset->save();

        Assign::create([
            'asset_id' => $asset->id,
            'user_id' => $user->id
        ]);

        return redirect()->back();
    }

    public function assetReturned(Asset $asset)
    {
        $asset->returned();
        return redirect()->back();
    }

    public function completeTicket(Request $request, Ticket $ticket)
    {
        $ticket->notes = $request->input('notes');
        $ticket->status = 'completed';
        $ticket->save();

        return redirect('admin');
    }


    public function assignAssetsView()
    {
        $assigns = Assign::orderBy('created_at', 'desc')->get();
        return view('admin.assign_assets', compact('assigns'));
    }

    public function assignAssetView()
    {
        $employees = User::where('role_id', 2)->get()->pluck('name', 'id');
        $assets = Asset::where('status', 'unassigned')->get()->pluck('number', 'id');
        return view('admin.assign_asset', compact(['employees', 'assets']));
    }

    public function assignCreate(CreateAssignRequest $request)
    {
        Assign::create($request->validated());

        Asset::find($request->input('asset_id'))->update([
            'status' => 'assigned'
        ]);

        return redirect()->route('assignAssetsView')->with('message', 'successfully assigned asset');
    }

    public function assignView(Assign $assign)
    {
        return view('admin.assign', compact('assign'));
    }


    public function getEmployee(User $user): string
    {
        return $user->toJson();
    }

    public function getAsset(Asset $asset): string
    {
        return $asset->toJson();
    }

    public function assignDownload()
    {
        $assignments = collect();
        $assigns = Assign::all();

        foreach ($assigns as $assign) {
            $assignments->push(collect([
                'name' => $assign->user->name,
                'email' => $assign->user->email,
                'asset name' => $assign->asset->name,
                'asset model' => $assign->asset->model,
                'asset number' => $assign->asset->number,
                'asset type' => $assign->asset->type,
                'asset mac id' => $assign->asset->mac_id,
                'asset memory' => $assign->asset->memory,
                'asset storage' => $assign->asset->storage,
            ]));
        }

        $attributes = array_keys($assignments[0]->toArray());

        $csvExport = new \Laracsv\Export();

        try {
            $csvExport->build($assignments, $attributes)->download();
        } catch (CannotInsertRecord $e) {
            return redirect()->back()->withErrors('error', 'error inserting csv');
        }

    }


    public function settingsView()
    {
        return view('admin.settings');
    }

    public function updateSettings(Request $request)
    {
        Setting::updateSettings($request->except('_token'));

        return redirect()->back();
    }

}

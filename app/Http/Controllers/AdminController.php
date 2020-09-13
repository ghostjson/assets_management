<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Requests\CreateAssetRequest;
use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\EditAssetRequest;
use App\Http\Requests\EditEmployeeRequest;
use App\Models\Asset;
use App\Models\Assign;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(AdminAuthMiddleware::class);
    }

    public function dashboardView()
    {
        $pending_tickets = Ticket::where('status', 'processing')->get();
        return view('admin.dashboard', compact('pending_tickets'));
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

    public function completeTicket(Ticket $ticket)
    {
        $ticket->status = 'completed';
        $ticket->save();

        return redirect('admin');
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

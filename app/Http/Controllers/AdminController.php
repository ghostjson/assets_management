<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAssetRequest;
use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\EditAssetRequest;
use App\Http\Requests\EditEmployeeRequest;
use App\Models\Asset;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboardView()
    {
        return view('admin.dashboard');
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



    public function settingsView()
    {
        return view('admin.settings');
    }
    public function logout()
    {
        // TODO logout implement
    }
}

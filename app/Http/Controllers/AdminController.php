<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAssetRequest;
use App\Http\Requests\EditAssetRequest;
use App\Models\Asset;
use Illuminate\Http\Request;

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
        return view('admin.employees');
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

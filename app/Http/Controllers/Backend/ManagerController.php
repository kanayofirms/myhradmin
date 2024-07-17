<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ManagerModel;
use App\Exports\ManagerExport;
use Maatwebsite\Excel\Facades\Excel;


class ManagerController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = ManagerModel::getRecord($request);
        return view("backend.manager.list", $data);
    }

    public function add(Request $request)
    {
        return view("backend.manager.add");
    }

    public function add_post(Request $request)
    {
        // dd($request->all());

        $user = request()->validate([
            'manager_name' => 'required|unique:manager',
            'manager_email' => 'required',
            'manager_phone' => 'required'
        ]);

        $user = new ManagerModel;
        $user->manager_name = trim($request->manager_name);
        $user->manager_email = trim($request->manager_email);
        $user->manager_phone = trim($request->manager_phone);
        $user->save();

        return redirect('admin/manager')->with('success', 'Manager successfully added.');
    }

    public function edit(Request $request, $id)
    {
        $data['getRecord'] = ManagerModel::find($id);
        return view('backend.manager.edit', $data);
    }

    public function edit_update(Request $request, $id)
    {
        $user = ManagerModel::find($id);
        $user->manager_name = trim($request->manager_name);
        $user->manager_email = trim($request->manager_email);
        $user->manager_phone = trim($request->manager_phone);
        $user->save();

        return redirect('admin/manager')->with('success', 'Manager successfully updated.');
    }

    public function delete($id)
    {
        $user = ManagerModel::find($id);
        $user->delete();

        return redirect()->back()->with('error', 'Record successfully deleted.');
    }

    public function manager_export(Request $request)
    {
        return Excel::download(new ManagerExport, 'manager.xlsx');
    }
}

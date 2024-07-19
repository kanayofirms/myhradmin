<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DepartmentsModel;
use App\Models\LocationsModel;
use App\Models\ManagerModel;
use App\Exports\DepartmentsExport;
use Maatwebsite\Excel\Facades\Excel;



class DepartmentsController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = DepartmentsModel::getRecord($request);
        return view('backend.departments.list', $data);
    }

    public function add(Request $request)
    {
        $data['getManager'] = ManagerModel::get();
        $data['getLocation'] = LocationsModel::get();
        return view('backend.departments.add', $data);
    }

    public function add_post(Request $request)
    {
        // dd($request->all());
        $user = request()->validate([
            'department_name' => 'required',
            'manager_id' => 'required',
            'locations_id' => 'required'
        ]);

        $user = new DepartmentsModel;
        $user->department_name = trim($request->department_name);
        $user->manager_id = trim($request->manager_id);
        $user->locations_id = trim($request->locations_id);
        $user->save();

        return redirect('admin/departments')->with('success', 'Departments successfully added.');
    }

    public function edit(Request $request, $id)
    {
        $data['getRecord'] = DepartmentsModel::find($id);
        $data['getLocation'] = LocationsModel::get();
        return view('backend.departments.edit', $data);
    }

    public function edit_update(Request $request, $id)
    {
        // dd($request->all());

        $user = DepartmentsModel::find($id);
        $user->department_name = trim($request->department_name);
        $user->manager_id = trim($request->manager_id);
        $user->locations_id = trim($request->locations_id);
        $user->save();

        return redirect('admin/departments')->with('success', 'Departments successfully updated.');
    }

    public function delete($id)
    {
        $user = DepartmentsModel::find($id);
        $user->delete();

        return redirect()->back()->with('error', 'Record successfully deleted.');
    }

    public function departments_export(Request $request)
    {
        return Excel::download(new DepartmentsExport, 'locations.xlsx');
    }
}

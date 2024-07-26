<?php

namespace App\Http\Controllers\Backend;

use App\Models\PayrollModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ModelsPayrollModel;
use App\Models\User;

class PayrollController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = PayrollModel::getRecord();
        return view('backend.payroll.list', $data);
    }

    public function view(Request $request, $id)
    {
        $data['getRecord'] = PayrollModel::find($id);
        return view('backend.payroll.view', $data);
    }

    public function add(Request $request)
    {
        $data['getEmployee'] = User::where('is_role', '=', 0)->get();
        return view('backend.payroll.add', $data);
    }

    public function edit(Request $request, $id)
    {
        $data['getRecord'] = PayrollModel::find($id);
        $data['getEmployee'] = User::where('is_role', '=', 0)->get();
        return view('backend.payroll.edit', $data);
    }

    public function edit_update(Request $request, $id)
    {
        // dd($request->all());

        $user = PayrollModel::find($id);
        $user->employee_id = trim($request->employee_id);
        $user->number_of_days_worked = trim($request->number_of_days_worked);
        $user->bonus = trim($request->bonus);
        $user->overtime = trim($request->overtime);
        $user->gross_salary = trim($request->gross_salary);
        $user->cash_advance = trim($request->cash_advance);
        $user->late_hours = trim($request->late_hours);
        $user->absent_days = trim($request->absent_days);
        $user->sss_contribution = trim($request->sss_contribution);
        $user->insure_health = trim($request->insure_health);
        $user->total_deduction = trim($request->total_deduction);
        $user->net_pay = trim($request->net_pay);
        $user->payroll_monthly = trim($request->payroll_monthly);
        $user->save();

        return redirect('admin/payroll')->with('success', "Payroll successfully updated.");
    }

    public function add_post(Request $request)
    {
        // dd($request->all());
        $user = new PayrollModel;
        $user->employee_id = trim($request->employee_id);
        $user->number_of_days_worked = trim($request->number_of_days_worked);
        $user->bonus = trim($request->bonus);
        $user->overtime = trim($request->overtime);
        $user->gross_salary = trim($request->gross_salary);
        $user->cash_advance = trim($request->cash_advance);
        $user->late_hours = trim($request->late_hours);
        $user->absent_days = trim($request->absent_days);
        $user->sss_contribution = trim($request->sss_contribution);
        $user->insure_health = trim($request->insure_health);
        $user->total_deduction = trim($request->total_deduction);
        $user->net_pay = trim($request->net_pay);
        $user->payroll_monthly = trim($request->payroll_monthly);
        $user->save();

        return redirect('admin/payroll')->with('success', "Payroll successfully added.");
    }

    public function delete($id)
    {
        $user = PayrollModel::find($id);
        $user->delete();

        return redirect()->back()->with('error', "Record successfully deleted");
    }
}

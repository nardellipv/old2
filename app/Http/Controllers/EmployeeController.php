<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddEmployeeRequest;
use App\Http\Requests\EditEmployeeRequest;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function listEmployee()
    {
        if (checkUserBranch()[1]) {
            $employees = Employee::with(['branch'])
                ->where('branch_id', checkUserBranch()[1]->id)
                ->get();
        } else {
            $employees = Employee::with(['branch'])
                ->get();
        }

        return view('admin.employees.indexEmployee', compact('employees'));
    }

    public function profileEmployee($id)
    {
        $employee = Employee::find($id);

        $detailWorks = Sale::with(['client', 'product'])
            ->select('*', DB::raw('COUNT(*) as count'))
            ->where('employee_id', $id)
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"), 'product_id')
            ->get();

        $branches = Branch::get();

        return view('admin.employees.profileEmployee', compact('employee', 'branches', 'detailWorks'));
    }

    public function addNewEmployee()
    {
        $branches = Branch::get();

        return view('admin.employees.addEmployee', compact('branches'));
    }

    public function addEmployee(AddEmployeeRequest $request)
    {
        $employee = Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'branch_id' => $request->branch_id,
        ]);

        toast('Se agregó el barbero ' . $employee->name . ' correctamente', 'success');
        return redirect()->route('list.employee');
    }
    public function editEmployee($id)
    {
        $employee = Employee::find($id);
        $branches = Branch::get();

        return view('admin.employees.editEmployee', compact('employee', 'branches'));
    }

    public function upgradeEmployee(EditEmployeeRequest $request, $id)
    {
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->phone = $request->phone;
        $employee->branch_id = $request->branch_id;
        $employee->save();

        toast('Se modifico el barbero ' . $employee->name . ' correctamente', 'success');
        return redirect()->route('list.employee');
    }

    public function deleteEmployee($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        toast('Se eliminó el barbero ' . $employee->name . ' correctamente', 'success');
        return redirect()->route('list.employee');
    }
}

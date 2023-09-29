<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddEmployeeRequest;
use App\Http\Requests\EditEmployeeRequest;
use App\Models\Branch;
use App\Models\Cash;
use App\Models\Employee;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function listEmployee()
    {
        if (checkUserBranch()[1]) {
            $employees = Employee::with(['branch'])
                ->where('branch_id', checkUserBranch()[1]->id)
                ->where('status', '1')
                ->get();
        } else {
            $employees = Employee::with(['branch'])
                ->where('status', '1')
                ->get();
        }

        return view('admin.employees.indexEmployee', compact('employees'));
    }

    public function profileEmployee($id)
    {
        $employee = Employee::find($id);

        $detailWorks = Sale::with(['client', 'product'])
            ->select('*', DB::raw('COUNT(*) as count'))
            ->join('employees', 'employees.id', 'employee_id')
            ->where('employee_id', $id)
            ->whereMonth('sales.created_at', date('m'))
            ->whereYear('sales.created_at', date('Y'))
            ->groupBy(DB::raw("DATE_FORMAT(sales.created_at, '%Y-%m-%d')"), 'product_id')
            ->get();

        $timeLineWork = Sale::with(['client', 'product'])
            ->where('employee_id', $id)
            ->whereDate('created_at', date('Y-m-d'))
            ->get();

        $pendingWorks = Sale::with(['product', 'client'])
            ->where('employee_id', $id)
            ->where('pending_pay', 0)
            ->where('commission_pay', '!=', '0')
            ->orderBy('created_at', 'ASC')
            ->get();

        $branches = Branch::get();

        return view('admin.employees.profileEmployee', compact('employee', 'branches', 'detailWorks', 'pendingWorks', 'timeLineWork'));
    }

    public function pendingWorksEmployee(Request $request, $id)
    {
        $employee = Employee::find($id);

        foreach ($request->sale as $key => $idSale) {
            $paymentsPending = Sale::where('id', $key)
                ->where('pending_pay', 0)
                ->first();

            $paymentsPending->pending_pay = '1';
            $paymentsPending->save();
        }

        $choosePay = Sale::with(['product'])
            ->where('employee_id', $id)
            ->where('pending_pay', '1')
            ->get();

        $sumTotal = Sale::where('employee_id', $id)
            ->where('pending_pay', '1')
            ->sum('commission_pay');

        Cash::create([
            'mount' => $sumTotal,
            'comment' => 'Pago comisión barbero' . $employee->name,
            'payment_id' => 1,
            'move' => 'E',
            'branch_id' => $employee->branch_id,
        ]);

        return view('admin.employees.invoicePayWork', compact('employee', 'choosePay', 'sumTotal'));
    }

    public function pendingCancelWorksEmployee($id)
    {
        $employee = Employee::find($id);

        $choosePay = Sale::with(['product'])
            ->where('employee_id', $id)
            ->where('pending_pay', '1')
            ->get();

        $sumTotal = Sale::where('employee_id', $id)
            ->where('pending_pay', '1')
            ->sum('commission_pay');

        return view('admin.employees.invoicePayWork', compact('employee', 'choosePay', 'sumTotal'));
    }

    public function cancelWorksEmployee($id)
    {

        $cancelWorks = Sale::where('employee_id', $id)
            ->where('pending_pay', '1')
            ->get();

        foreach ($cancelWorks as $cancel) {
            $cancel->pending_pay = '2';
            $cancel->save();
        }

        toast('Se cancelo lo adeudado a ' . $cancel->employee->name . ' correctamente', 'success');
        return redirect()->route('list.employee');
    }

    public function historialWorksEmployee($id)
    {
        $employee = Employee::find($id);

        $historialWorks = Sale::with(['product', 'client'])
            ->where('employee_id', $id)
            ->paginate(10);

        return view('admin.employees.historialWorks', compact('employee', 'historialWorks'));
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
            'commission' => $request->commission,
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
        $employee->commission = $request->commission;
        $employee->branch_id = $request->branch_id;
        $employee->save();

        toast('Se modifico el barbero ' . $employee->name . ' correctamente', 'success');
        return redirect()->route('list.employee');
    }

    public function statusEmployee()
    {
        $employeeDown = Employee::with(['branch'])
            ->where('status', '0')
            ->get();

        return view('admin.employees.ListDownEmployee', compact('employeeDown'));
    }

    public function downEmployee($id)
    {
        $employeeDown = Employee::find($id);
        $employeeDown->status = '0';
        $employeeDown->save();

        return redirect()->route('list.employee');
    }

    public function upEmployee($id)
    {
        $employeeDown = Employee::find($id);
        $employeeDown->status = '1';
        $employeeDown->save();

        return redirect()->route('list.employee');
    }
}

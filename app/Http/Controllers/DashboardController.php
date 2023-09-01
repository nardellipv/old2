<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (checkUserBranch()[1]) {
            $clients = Client::with(['branch'])
                ->where('branch_id', checkUserBranch()[1]->id)
                ->get();

            $products = Product::where('show', 'Y')
                ->where('branch_id', checkUserBranch()[1]->id)
                ->get();

            $employees = Employee::where('branch_id', checkUserBranch()[1]->id)
                ->where('status', 1)
                ->get();
        } else {
            $clients = Client::with(['branch'])
                ->get();

            $products = Product::with(['branch'])
                ->where('show', 'Y')
                ->get();

            $employees = Employee::with(['branch'])
                ->where('status', 1)
                ->get();
        }

        $sellingAllBranchCount = Sale::select('*', DB::raw('SUM(price) as sum'))
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
            ->get();

        $sellingAllBranchSum = Sale::with(['product', 'branch'])
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->sum('price');

        $clientAllBranchCount = Client::with(['branch'])
            ->count();

        $clientAllBranchSum = Client::select('*', DB::raw('COUNT(*) as count'))
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
            ->get();

        $payments = Payment::get();

        return view('admin.index', compact(
            'clients',
            'products',
            'sellingAllBranchCount',
            'sellingAllBranchSum',
            'clientAllBranchCount',
            'clientAllBranchSum',
            'employees',
            'payments'
        ));
    }
}

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
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://weatherapi-com.p.rapidapi.com/current.json?q=Mendoza%2C%20Argentina', [
            'headers' => [
                'X-RapidAPI-Host' => 'weatherapi-com.p.rapidapi.com',
                'X-RapidAPI-Key' => '7644444f5dmsh2b3045f3e947681p17a1dejsn9e8a8e11a5fd',
            ],
        ]);

        $j = $response->getBody();
        $weather = json_decode($j);

        if (checkUserBranch()[1]) {
            $clients = Client::with(['branch'])
                ->where('branch_id', checkUserBranch()[1]->id)
                ->get();

            $products = Product::where('branch_id', checkUserBranch()[1]->id)
                ->get();

            $employees = Employee::where('branch_id', checkUserBranch()[1]->id)
                ->where('status', 1)
                ->get();
        } else {
            $clients = Client::with(['branch'])
                ->get();

            $products = Product::with(['branch'])
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
            'payments',
            'weather'
        ));
    }
}

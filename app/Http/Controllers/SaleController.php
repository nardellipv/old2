<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleWithOutClientRequest;
use App\Models\Sale;

class SaleController extends Controller
{
    public function saleWithOutClient(SaleWithOutClientRequest $request)
    {

        Sale::create([
            'product_id' => $request->product_id,
            'payment_id' => $request->payment_id,
            'branch_id' => checkUserBranch()[1]->id,
            'employee_id' => $request->employee_id,
            'price' => $request->price,
            'invoice' => 3,
        ]);

        return back();
    }
}

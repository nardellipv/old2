<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleWithOutClientRequest;
use App\Models\Product;
use App\Models\Sale;

class SaleController extends Controller
{
    public function SaleWithOutClient(SaleWithOutClientRequest $request)
    {
        $product = Product::where('id', $request->product_id)
            ->first();

        Sale::create([
            'product_id' => $product->id,
            'payment_id' => $request->payment_id,
            'branch_id' => checkUserBranch()[1]->id,
            'employee_id' => $request->employee_id,
            'price' => $product->price,
            'invoice' => 3,
        ]);

        return back();
    }
}

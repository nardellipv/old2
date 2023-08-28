<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleClientRequest;
use App\Http\Requests\SaleWithOutClientRequest;
use App\Models\Client;
use App\Models\Product;
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
            'invoice' => invoiceNumberTemp(),
        ]);

        return back();
    }

    public function saleClient(SaleClientRequest $request, $id)
    {

        $invoiceNum = invoiceNumberTemp();

        foreach ($request->quantity as $key => $data) {
            $product = Product::where('id', $key)
                ->first();

            $client = Client::find($id);

            $total_points = $client->total_points + $product->point;

            $price = $data[0] * $product->price;

            if ($data[0] != 0) {
                Sale::create([
                    'client_id' => $id,
                    'product_id' => $product->id,
                    'payment_id' => $request->payment_id,
                    'branch_id' => checkUserBranch()[1]->id,
                    'employee_id' => $request->employee_id,
                    'price' => $price,
                    'invoice' => $invoiceNum,
                ]);

                $client->total_points = $total_points;
                $client->save();
            }
        }

        toast('Venta realizada con éxito', 'success');
        return redirect()->route('dashboard');
    }
}

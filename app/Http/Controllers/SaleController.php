<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleClientRequest;
use App\Http\Requests\SaleWithOutClientRequest;
use App\Models\Cash;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Sale;

class SaleController extends Controller
{
    public function saleWithOutClient(SaleWithOutClientRequest $request)
    {

        $employee = Employee::where('id', $request->employee_id)
            ->first();

        $commission = (($request->price * $employee->commission)  / 100);

        $saleWithOutClient = Sale::create([
            'product_id' => $request->product_id,
            'payment_id' => $request->payment_id,
            'branch_id' => checkUserBranch()[1]->id,
            'employee_id' => $request->employee_id,
            'price' => $request->price,
            'quantity' => 1,
            'commission_pay' => $commission,
            'invoice' => invoiceNumberTemp(),
            'pending_pay' => 0,
        ]);

        Cash::create([
            'mount' => $request->price,
            'comment' => 'Venta de producto',
            'payment_id' => $request->payment_id,
            'invoice_id' => $saleWithOutClient->invoice,
            'move' => 'I',
            'branch_id' => checkUserBranch()[1]->id
        ]);

        toast('Venta realizada con éxito', 'success');
        return back();
    }

    public function saleClient(SaleClientRequest $request, $id)
    {

        // dd($request->all());
        $invoiceNum = invoiceNumberTemp();

        $employee = Employee::where('id', $request->employee_id)
            ->first();

        foreach ($request->quantity as $key => $data) {
            $product = Product::where('id', $key)
                ->first();

            $commission = number_format(((($product->price * $data) * $employee->commission)  / 100), 0);

            $client = Client::find($id);

            $total_points = $client->total_points + $product->point;

            if ($data[0] != 0) {
                $saleWithClient = Sale::create([
                    'client_id' => $id,
                    'product_id' => $product->id,
                    'payment_id' => $request->payment_id,
                    'branch_id' => checkUserBranch()[1]->id,
                    'employee_id' => $request->employee_id,
                    'price' => $product->price,
                    'quantity' => $data,
                    'commission_pay' => $commission,
                    'invoice' => $invoiceNum,
                    'pending_pay' => 0,
                ]);

                $client->total_points = $total_points;
                $client->save();

                Cash::create([
                    'mount' => $product->price,
                    'comment' => 'Venta de producto',
                    'payment_id' => $request->payment_id,
                    'invoice_id' => $saleWithClient->invoice,
                    'move' => 'I',
                    'branch_id' => checkUserBranch()[1]->id
                ]);
            }

        }

        toast('Venta realizada con éxito', 'success');
        return redirect()->route('dashboard');
    }
}

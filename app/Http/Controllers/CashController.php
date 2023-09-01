<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMoveCashRequest;
use App\Models\Cash;
use App\Models\Payment;
use App\Models\Sale;

class CashController extends Controller
{

    public function cashIndex()
    {
        $payments = Payment::get();

        if (checkUserBranch()[1]) {
            $cashMove = Cash::with(['payment'])
                ->where('branch_id', checkUserBranch()[1]->id)
                ->whereDay('created_at', date('d'))
                ->paginate(10);
        } else {
            $cashMove = Cash::with(['payment', 'branch'])
                ->whereDay('created_at', date('d'))
                ->paginate(10);
        }

        return view('admin.cash.indexCash', compact('payments', 'cashMove'));
    }

    public function cashMove(AddMoveCashRequest $request)
    {

        Cash::create([
            'mount' => $request->mount,
            'comment' => $request->comment,
            'payment_id' => $request->payment_id,
            'invoice_id' => $request->invoice_id,
            'move' => $request->move,
            'branch_id' => checkUserBranch()[1]->id
        ]);

        toast('Se realizó el movimiento de dinero correctamente', 'success');
        return back();
    }

    public function receiptIndex()
    {
        if (checkUserBranch()[1]) {
            $invoices = Sale::with(['branch', 'product', 'payment', 'employee'])
                ->where('branch_id', checkUserBranch()[1]->id)
                ->get();
        } else {
            $invoices = Sale::with(['branch', 'product', 'payment', 'employee'])
                ->get();
        }

        return view('admin.invoices.indexInvoice', compact('invoices'));
    }

    public function cashReceipt($id)
    {
        $invoice = Sale::with(['product', 'employee'])
            ->where('invoice', $id)
            ->get();

        $invoiceData = Sale::with(['product', 'employee'])
            ->where('invoice', $id)
            ->first();

        foreach ($invoice as $sum) {
            $invoiceSum = Sale::with(['product', 'employee'])
                ->where('invoice', $id)
                ->sum('price');

            $totalSum = $invoiceSum * $sum->quantity;
        }

        return view('admin.cash.invoice', compact('invoice', 'totalSum', 'invoiceData'));
    }
}

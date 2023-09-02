<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMoveCashRequest;
use App\Http\Requests\SearchMoveRequest;
use App\Models\Cash;
use App\Models\Payment;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

            $cashesDiaryChart = Cash::select('*', DB::raw('SUM(mount) as sum'))
                ->where('branch_id', checkUserBranch()[1]->id)
                ->whereDate('created_at', now())
                ->groupBy('move')
                ->get();
        } else {
            $cashMove = Cash::with(['payment', 'branch'])
                ->whereDay('created_at', date('d'))
                ->paginate(10);
        }

        return view('admin.cash.indexCash', compact('payments', 'cashMove', 'cashesDiaryChart'));
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

    public function historicMove()
    {
        $payments = Payment::get();

        if (checkUserBranch()[1]) {
            $cashMove = Cash::with(['payment'])
                ->where('branch_id', checkUserBranch()[1]->id)
                ->get();

            $incomeWidget = Cash::where('branch_id', checkUserBranch()[1]->id)
                ->where('move', 'I')
                ->sum('mount');

            $billWidget = Cash::where('branch_id', checkUserBranch()[1]->id)
                ->where('move', 'E')
                ->sum('mount');
        } else {
            $cashMove = Cash::with(['payment', 'branch'])
                ->get();

            $incomeWidget = Cash::where('move', 'I')
                ->sum('mount');

            $billWidget = Cash::where('move', 'E')
                ->sum('mount');
        }

        return view('admin.cash.historicMove', compact('payments', 'cashMove', 'incomeWidget', 'billWidget'));
    }

    public function searchMove(SearchMoveRequest $request)
    {
        $payments = Payment::get();

        if (checkUserBranch()[1]) {
            if (!$request->move) {
                $search = Cash::with(['payment'])
                    ->where('branch_id', checkUserBranch()[1]->id)
                    ->whereDate('created_at', '>=', $request->dateFrom)
                    ->whereDate('created_at', '<=', $request->dateEnd)
                    ->get();
            } else {
                $search = Cash::with(['payment'])
                    ->where('branch_id', checkUserBranch()[1]->id)
                    ->whereDate('created_at', '>=', $request->dateFrom)
                    ->whereDate('created_at', '<=', $request->dateEnd)
                    ->where('move', $request->move)
                    ->get();
            }
        } else {
            if (!$request->move) {
                $search = Cash::with(['payment', 'branch'])
                    ->whereDate('created_at', '>=', $request->dateFrom)
                    ->whereDate('created_at', '<=', $request->dateEnd)
                    ->get();
            } else {
                $search = Cash::with(['payment', 'branch'])
                    ->whereDate('created_at', '>=', $request->dateFrom)
                    ->whereDate('created_at', '<=', $request->dateEnd)
                    ->where('move', $request->move)
                    ->get();
            }
        }

        return view('admin.cash.resultFilter', compact('search', 'payments'));
    }
}

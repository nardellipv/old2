<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPaymentRequest;
use App\Http\Requests\EditPaymentRequest;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function listPayment()
    {
        $payments = Payment::get();

        return view('admin.payments.indexPayment', compact('payments'));
    }

    public function addPayment(AddPaymentRequest $request)
    {
        $payment = Payment::create([
            'name' => $request->name,
        ]);

        toast('Se agregó el medio de pago' . $payment->name . ' correctamente', 'success');
        return redirect()->route('list.payment');
    }

    public function editPayment($id)
    {
        $payment = Payment::find($id);

        return view('admin.payments.editPayment', compact('payment'));
    }

    public function upgradePayment(EditPaymentRequest $request, $id)
    {
        $payment = Payment::find($id);
        $payment->name = $request->payment;
        $payment->save();

        toast('Se modificó el medio de pago correctamente', 'success');
        return redirect()->route('list.payment');
    }

    public function deletePayment($id)
    {
        $payment = Payment::find($id);
        $payment->delete();

        toast('Se eliminó el medio de pago correctamente', 'success');
        return redirect()->route('list.payment');
    }
}

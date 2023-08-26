<?php

use App\Models\Sale;


function invoiceNumberTemp()
{
    $invoiceNumberTemp = Sale::latest('invoice')
        ->first();

    if (!$invoiceNumberTemp) {
        $invoiceNum = 1;
    } else {
        $invoiceNum = $invoiceNumberTemp->invoice + 1;
    }

    return $invoiceNum;
}

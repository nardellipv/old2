<?php

use App\Models\Branch;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

function userConnect()
{
    return Auth::user();
}

function checkUserBranch()
{
    $userBranch = User::where('id', userConnect()->id)
        ->first('branch_id');

    $branchTemp = Branch::where('id', $userBranch->branch_id)
        ->first();

    return [$userBranch, $branchTemp];
}

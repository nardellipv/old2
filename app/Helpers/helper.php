<?php

use App\Models\Branch;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

function userConnect()
{
    return Auth::user();
}

function checkUserBranch()
{
    $userBranch = User::where('id', userConnect()->id)
        ->first('branch');

    $branchTemp = Branch::where('id', $userBranch->branch)
        ->first();

    return [$userBranch, $branchTemp];
}

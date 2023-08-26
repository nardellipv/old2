<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddBranchRequest;
use App\Models\Branch;
use App\Models\User;

class BranchController extends Controller
{
    public function listBranches()
    {
        $branches = Branch::get();

        return view('admin.branches.indexBranch', compact('branches'));
    }

    public function activeBranches($id)
    {
        if ($id == 0) {
            $branch = User::where('id', userConnect()->id)
                ->first();
            $branch->branch = $id;
            $branch->save();

            toast('Se cambio a la vista de todas las sucursales correctamente', 'success');
            return redirect()->route('dashboard');
        } else {
            $branch = User::where('id', userConnect()->id)
                ->first();
            $branch->branch = $id;
            $branch->save();

            toast('Se cambio a la sucursal ' . checkUserBranch()[1]->name . ' correctamente', 'success');
            return redirect()->route('dashboard');
        }
    }

    public function addBranches(AddBranchRequest $request)
    {
        $branch = Branch::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        toast('Se creo la sucursal ' . $branch->name . ' correctamente', 'success');
        return redirect()->route('list.branch');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditProfileUserRequest;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function addNewUser()
    {
        $branches = Branch::get();

        return view('admin.profile.addUser', compact('branches'));
    }

    public function profileIndex($id)
    {
        $user = User::where('id', $id)
            ->first();

        $branches = Branch::get();

        return view('admin.profile.profile', compact('user', 'branches'));
    }

    public function listUser()
    {
        $users = User::with(['branch'])
            ->get();

        return view('admin.profile.indexUsers', compact('users'));
    }

    public function upgradeIndex(EditProfileUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        if ($request->image) {
            $user->image = $request->image;
        }
        if ($request->branch_id) {
            $user->branch_id = $request->branch_id;
        }
        $user->save();

        toast('Se actualizó el perfil correctamente', 'success');
        return redirect()->route('dashboard');
    }

    public function newUser(AddUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $request->image,
            'branch_id' => $request->branch_id,
            'password' => Hash::make($request->password),
        ]);

        toast('Se creó el nuevo usuario ' . $user->name . ' correctamente', 'success');
        return redirect()->route('dashboard');
    }
}

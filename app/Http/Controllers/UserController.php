<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditProfileUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profileIndex()
    {
        $user = User::where('id', userConnect()->id)
        ->first();

        return view('admin.profile.indexProfile', compact('user'));
    }

    public function upgradeIndex(EditProfileUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->image = $request->image;
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
            'password' => Hash::make($request->password),
        ]);

        toast('Se creó el nuevo usuario '. $user->name .' correctamente', 'success');
        return redirect()->route('dashboard');
    }
}

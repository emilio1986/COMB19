<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UsuariosController extends Controller
{
    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8'
        ]);

        $user = User::findOrFail($request->id);
        if ($request->email != $user->email) {
            $request->validate([
                'email' => 'required|string|email|max:255|unique:users',

            ]);
        }

        $user->update($request->all());
        $password = Hash::make($request->password);
        $user->update(['password' => $password]);

        return redirect()->to(route('profile', ['user' => $user->id]))
            ->with('perfilmodificado', 'open');
    }


    public function edit(User $user)
    {

        if (($user->id ==  Auth::user()->id) or (Auth::user()->hasRole('administrator'))) {

            return view('user.modificarperfil', ['user' => $user]);
        } else {
            abort(403);
        }
    }
}

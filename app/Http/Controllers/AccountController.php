<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function change_avatar(Request $request)
    {
        $user = Auth::user();
        $user->clearMediaCollection('avatar');
        $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');

        return redirect()->route('account');
    }

    public function show(User $user)
    {
        $user = Auth::user();
        return view('account.show', compact('user'));
    }

    public function edit(User $user)
    {
        $user = Auth::user();
        return view('account.edit', compact('user'));

        $user->addMedia('')->toMediaCollection('avatar');
    }

    public function update(Request $request, User $user)
    {
        $user = User::find(Auth::user()->id);

        $this->validate($request, [
            'name' => 'required|unique:users,name,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);


        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('account');
    }
}

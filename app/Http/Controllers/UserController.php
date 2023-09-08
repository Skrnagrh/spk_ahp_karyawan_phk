<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return redirect('/userprofile')->with('success', 'Kata Sandi Berhasil di Ubah!');
    }

    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $data['title'] = 'Profile';
        return view('pages.profile.index', $data, compact('user'));
    }

    public function edit()
    {
        $user = User::findOrFail(Auth::id());
        $data['title']  = 'Profile';
        return view('pages.profile.edit', $data, compact('user'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'name'       => 'required|string|min:2|max:100',
            'email' => 'required|email',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        return redirect('/userprofile')->with('success', 'Profile Anda Berhasil di Perbaharui!');
    }
}

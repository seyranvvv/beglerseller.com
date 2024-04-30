<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordChangeController extends Controller
{
    public function edit()
    {
        $obj = auth()->user();

        return view('admin.password-change.edit', compact('obj'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'old_password' => 'required|string|max:100',
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        $obj = auth()->user();

        $oldPassCorrect = Hash::check($data['old_password'], $obj->password);

        if (!$oldPassCorrect)
            return redirect()->back()->withErrors(['old_password'=>'Old password doesn\'t match!'])->withInput();

        $obj->password = Hash::make($data['password']);

        $obj->save();

        return redirect()->back()->with('success', 'Password Changed!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;

class UserController extends Controller
{
    public function index() 
    {
        $user = Auth::user();
        
        return view('client.dashboard', compact('user'));
    }

    public function edit() 
    {
        $user = Auth::user();

        return view('client.edit', compact('user'));
    }

    public function update(UpdateProfileRequest $request) 
    {
        $user = Auth::user();
        $validated = $request->validated();
        $user->update($validated);

        return redirect()->back()->with('success-update', 'Updated successfully');
    }

    public function toChangePassword() 
    {
        $user = Auth::user();
        
        if (!$user) {
            abort(403, 'Unauthorized');
        }

        return view('client.change-password', compact('user'));
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();

        if ($user && Hash::check($request->current_password, $user->password)) {
            if ($user->id !== $request->user()->id) {
                abort(403);
            }

            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return back()->with('success-password', 'Successfully changed password');
        }

        return back()->withErrors(['current_password' => 'Incorrect current password.']);
    }
}

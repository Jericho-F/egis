<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() 
    {
        $getUsers = User::where('role', 'client')->get();

        return view('admin.dashboard', compact('getUsers'));
    }

    public function lockUser($id) 
    {
        $user = User::find($id);
        $user->update(['status' => 1]);

        return redirect()->back();
    }
}

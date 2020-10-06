<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = \App\User::all();
        return view('admin.user', compact('users'));
    }
    public function destroy($id)
    {
        $duration = \App\User::findOrFail($id);
        $duration->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }

    public function update()
    {

    }

    public function edit($id)
    {
        $user = \App\User::findOrFail($id);
        return view('admin.useredit', compact('user'));
    }
}

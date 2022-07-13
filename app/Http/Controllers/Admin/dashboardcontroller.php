<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class dashboardcontroller extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('admin.users.index' , compact('users'));
    }

    public function viewuser($id)
    {
        $user = User::find($id);
        return view('admin.users.view' , compact('user'));
    }
}

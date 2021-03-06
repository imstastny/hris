<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KelolaController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
}

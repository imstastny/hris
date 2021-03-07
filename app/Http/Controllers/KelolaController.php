<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class KelolaController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
    public function edit(User $user)
    {
        return view('user.show', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $attr = $request->all();
        $user->update($attr);
    }
    public function destroy(User $user)
    {
        $user->delete();
    }
}

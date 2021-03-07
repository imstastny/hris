<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;

class KelolaController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
    public function create()
    {
        return view('user.create');
    }
    public function store(UserRequest $request)
    {
        $attr = $request->all();
        $attr['password'] = Hash::make($request['password']);
        User::create($attr);
        return redirect(route('user.index'));
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

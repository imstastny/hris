<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Divisi;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KelolaController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
    public function create()
    {
        return view('user.create', [
            'roles' => Role::get(),
            'divisis' => Divisi::get(),
        ]);
    }
    public function store(UserRequest $request)
    {
        $attr = $request->all();
        $attr['role_id'] = request('role');
        $attr['divisi_id'] = request('divisi');
        $attr['password'] = Hash::make($request['password']);
        User::create($attr);
        return redirect(route('kelola.index'));
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

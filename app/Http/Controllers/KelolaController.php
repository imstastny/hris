<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Cuti;
use App\Models\Divisi;
use App\Models\Izin;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class KelolaController extends Controller
{
    public function index()
    {
        $users = User::all();
        foreach ($users as $user) {
            $cuti = Cuti::where([
                ['user_id', '=', $user->id],
                ['acc_hrd_id', '=', 3]
            ]);
            $izin = Izin::where([
                ['user_id', '=', $user->id],
                ['acc_hrd_id', '=', 3]
            ]);
        }
        $users = User::with('cutis', 'izins')->orderBy('divisi_id', 'ASC')->get();

        $user->cutis = $cuti;
        $user->izins = $izin;

        return view('user.index', compact('users', 'cuti', 'izin'));
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
        $request->validate([
            'password' => 'required|min:6'
        ]);
        $attr = $request->all();
        $attr['role_id'] = request('role');
        $attr['divisi_id'] = request('divisi');
        $attr['password'] = Hash::make($request['password']);
        User::create($attr);
        return redirect(route('kelola.index'));
    }
    public function edit(User $user)
    {

        return view('user.edit', [
            'user' => $user,
            'roles' => Role::get(),
            'divisis' => Divisi::get(),
            // 'password' => Crypt::decrypt($user->password);
        ]);
    }
    public function update(UserRequest $request, User $user)
    {
        $attr = $request->all();
        $attr['role_id'] = request('role');
        $attr['divisi_id'] = request('divisi');
        $user->update($attr);
        return redirect(route('kelola.index'));
    }
    public function destroy(User $user)
    {
        $user->delete();
    }
}

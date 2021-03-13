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


class KelolaController extends Controller
{
    public function index()
    {
        $cuti1 = User::withCount([
            'cutis' => function ($query) {
                $query->where('acc_hrd_id', 3);
            },
            'izins' => function ($query) {
                $query->where('acc_hrd_id', 3);
            }
        ])->orderBy('divisi_id', 'asc')->with('role', 'divisi')->get();

        $users = ($cuti1->toArray());
        // dd($users);

        // $users = User::all();
        // foreach ($users as $user) {
        //     $cuti = Cuti::where([
        //         ['user_id', '=', $user->id],
        //         ['acc_hrd_id', '=', 3]
        //     ]);
        //     $izin = Izin::where([
        //         ['user_id', '=', $user->id],
        //         ['acc_hrd_id', '=', 3]
        //     ]);
        //     $users = User::with('cutis', 'izins')->orderBy('divisi_id', 'ASC')->get();

        //     $user->cutis = $cuti;
        //     $user->izins = $izin;
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
        $request->validate([
            'nik' => 'required|unique:users|alpha_num|min:3|max:20',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:users',
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
        $cuti1 = Cuti::where([
            ['user_id', '=', $user->id],
            ['kategori_id', '=', 1],
            ['acc_hrd_id', '=', 3]
        ])->count();
        $cuti2 = Cuti::where([
            ['user_id', '=', $user->id],
            ['kategori_id', '=', 2],
            ['acc_hrd_id', '=', 3]
        ])->count();
        $izin = Izin::where([
            ['user_id', '=', $user->id],
            ['acc_hrd_id', '=', 3]
        ])->count();

        return view('user.edit', [
            'user' => $user,
            'cuti1' => $cuti1,
            'cuti2' => $cuti2,
            'izin' => $izin,
            'roles' => Role::get(),
            'divisis' => Divisi::get()
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

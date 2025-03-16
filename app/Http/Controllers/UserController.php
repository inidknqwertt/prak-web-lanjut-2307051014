<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Http\Requests\UserRequest;
use App\Models\UserModel;
use App\Models\User;

class UserController extends Controller
{
    public function create(){
        
        return view('create_user', [
            'kelas' => Kelas::all(),
        ]);
    }

    public function store(UserRequest $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $user = UserModel::create($validateData);

        $user->load('kelas');

        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
    ]);

    }
}

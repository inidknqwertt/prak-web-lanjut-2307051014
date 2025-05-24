<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Http\Requests\UserRequest;
use App\Models\UserModel;
use App\Models\User;

class UserController extends Controller
{
  
    public function store(UserRequest $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk foto
        ]);
    
        // Meng-handle upload foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            // Menyimpan file foto di folder 'uploads'
            $fotoPath = $foto->move('upload/img', $foto->getClientOriginalName());
        } else {
            // Jika tidak ada file yang diupload, set fotoPath menjadi null atau default
            $fotoPath = null;
        }
    
        // Menyimpan data ke database termasuk path foto
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $fotoPath, // Menyimpan path foto
        ]);
    
        return redirect()->to('/user/list')->with('success', 'User berhasil ditambahkan');
    }

    public function show($id){
        $user = $this->userModel->getUser($id);

        $data = [
            'title' => 'Profile',
            'user' => $user,
        ];

        return view('profile', $data);

        $user = UserModel::findOrFail($id);
        $kelas = Kelas::find($user->kelas_id);

        $title = 'Detail ' . $user->nama;

        return view('show_user', compact('user', 'kelas', 'title'));
    }

    public function create()
    {
        $kelasModel = new Kelas();

        $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public $userModel;
    public $kelasModel;

    public function __construct()
    {
    $this->userModel = new UserModel();
    $this->kelasModel = new Kelas();
    }

public function index() 
    { 
    $data = [ 
        'title' => 'Create User',
        'title' => 'List User', 
        'users' => $this->userModel->getUser(), 
    ]; 
 
    return view('list_user', $data);
    }
    
public function edit($id)
    {
        $user = $this->userModel->getUser($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $title = 'User Edit';
        return view('edit_user', compact('user', 'kelas', 'title'));
    }

public function update(Request $request,$id)
    {
        $user = UserModel::findOrFail($id);

        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->kelas_id = $request->kelas_id;

        if ($request->hasFile('foto')) {
        $fileName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('uploads'), $fileName);
        $user->foto = 'uploads/' . $fileName;
    }

    $user->save();

    return redirect()->route('user.list')->with('success', 'User updated successfully');
    }

public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

    return redirect()->to('/user/list')->with('success', 'User has been deleted successfully');
    }

} 
@extends('layouts.app')

@section('content')

    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4dc;
            margin: 0;
        }
        .form-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 320px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
            align-items: left;
        }
        label {
            margin-bottom: 5px;
            text-align: left;
        }
        input[type="text"], select {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            text-align: left;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        input[type="text"]:hover, input[type="text"]:focus, select:hover, select:focus {
            border-color: rgb(46, 238, 88);
            box-shadow: 0 0 5px rgba(46, 238, 88, 0.5);
            outline: none;
        }
        .submit-btn {
            width: 90%;
            padding: 12px;
            background-color: rgb(46, 238, 88);
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .submit-btn:hover {
            background-color: rgb(9, 179, 0);
        }
    </style>

<div class="form-container">
        <h2>Edit User</h2>
        <form action="{{ route('user.update', $user['id']) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $user->nama) }}">
                @foreach($errors->get('nama') as $msg)
                <p class="text-red-500 text-sm mt-1">{{$msg}}</p>
                @endforeach
            </div>
            <div class="form-group">
                <label for="npm">NPM:</label>
                <input type="text" id="npm" name="npm" value="{{ old('npm', $user->npm) }}">
                @foreach($errors->get('npm') as $msg)
                <p class="text-red-500 text-sm mt-1">{{$msg}}</p>
                @endforeach
            </div>
            <div class="form-group">
                <label for="id_kelas">Kelas</label>
                <select name="kelas_id" id="kelas_id">
                    @foreach($kelas as $kelasItem)
                    <option value="{{$kelasItem->id}}"
                        {{$kelasItem->id == $user->kelas_id ? 'selected' : ''}}>
                        {{$kelasItem->nama_kelas}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <input type="file" id="foto" name="foto"><br><br>
                <label for="foto">Foto:</label>
               @if($user->foto)
               <img src="{{ asset($user->foto) }}" alt="User Photo" width="100" class="mt-2">
               @endif
            </div>

            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>

@endsection
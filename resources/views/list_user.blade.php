@extends('layouts.app')

@section('content')
<style>
    body {
        background: url('{{ asset('assets/img/doraemon.jpg') }}') no-repeat center center fixed;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    /* Overlay agar lebih nyaman dibaca */
    body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.3); /* Transparansi */
        z-index: -1;
    }

    .container {
        width: 70%;
        padding: 30px;
        background: rgba(255, 255, 255, 0.85); /* Lebih transparan */
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        text-align: center;
    }

    h2 {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 20px;
        color:rgb(62, 92, 152);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    thead {
        background:rgb(115, 135, 157);
        color: white;
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tbody tr {
        background-color: #f9f9f9;
        transition: background-color 0.3s;
    }

    tbody tr:hover {
        background-color: #cce5ff;
    }
</style>

<div class="container">
    <h2>Daftar Mahasiswa</h2>
    <div class="overflow-x-auto">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['nama'] }}</td>
                    <td>{{ $user['npm'] }}</td>
                    <td>{{ $user['nama_kelas'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

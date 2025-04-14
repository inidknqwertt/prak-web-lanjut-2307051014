<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(255, 255, 255);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .profile-card {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 400px;
        }
        .profile-img {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 20px;
            border: 6px solid #99ffcc;
        }
        .profile-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .profile-info {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            background: rgb(212, 214, 214);
            border-radius: 8px;
            font-weight: bold;
            color: rgb(6, 15, 26);
            font-size: 18px;
            text-align: justify;
        }
    </style>
</head>
<body>

    <div class="profile-card">
        <div class="profile-img">
        <img src="{{ asset($user->foto) }}" alt="Foto {{ $user->nama }}" width="50">
        </div>
        <div class="profile-info">Nama: {{ $user->nama }}</div>
        <div class="profile-info">Kelas: {{ $user->nama_kelas ?? 'Kelas tidak ditemukan' }}</div>
        <div class="profile-info">NPM: {{ $user->npm }}</div>

    </div>

</body>
</html>
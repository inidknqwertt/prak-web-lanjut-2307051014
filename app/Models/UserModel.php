<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function getUser($id = null)
    {
        $query = $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
                      ->select('user.*', 'kelas.nama_kelas as nama_kelas');
    
        if ($id) {
            return $query->where('user.id', $id)->first(); // ambil satu data
        }
    
        return $query->get(); // ambil semua
    }
    
}
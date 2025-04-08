<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;


class Kelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'kelas';

    public function getKelas(): Collection{
        return $this->all();
    }

    public function users() {
        return $this->hasMany(User::class, 'kelas_id');
    }
}
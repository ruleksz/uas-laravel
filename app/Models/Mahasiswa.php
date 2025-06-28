<?php

namespace App\Models;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'nim', 'email', 'alamat', 'dosen_id'];

    // Mahasiswa.php
    public function matakuliahs()
    {
        return $this->belongsToMany(Matakuliah::class);
    }
    // public function dosen()
    // {
    //     return $this->belongsTo(User::class, 'dosen_id'); // diasumsikan model dosen = user
    // }
    public function dosen()
{
    return $this->belongsTo(Dosen::class);
}

    // Matakuliah.php
    public function mahasiswas()
    {
        return $this->belongsToMany(Mahasiswa::class);
    }
}

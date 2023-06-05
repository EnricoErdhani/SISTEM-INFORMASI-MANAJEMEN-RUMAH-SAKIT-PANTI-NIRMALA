<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = "pegawai";
    protected $primaryKey = 'ID_PEGAWAI';
    protected $fillable = ['ID_PEGAWAI', 'ID_PENGGUNA', 'NAMA', 'ALAMAT', 'JENIS_KELAMIN', 'EMAIL', 'NOMOR_TELEPON'];
    public $timestamps = false;
}

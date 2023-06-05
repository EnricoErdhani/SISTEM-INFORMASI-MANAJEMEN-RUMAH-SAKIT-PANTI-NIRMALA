<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = "dokter";
    protected $primaryKey = 'ID_DOKTER';
    protected $fillable = ['ID_DOKTER', 'ID_PENGGUNA', 'NOMOR_IZIN_PRAKTIK', 'TANGGAL_KADALUARSA_IZIN_PRAKTIK', 'NAMA', 'JENIS_KELAMIN', 'EMAIL', 'SPESIALISASI', 'GAJI', 'STATUS'];
    public $timestamps = false;
}

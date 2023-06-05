<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenaga_Kesehatan extends Model
{
    use HasFactory;
    protected $table = "tenaga_kesehatan";
    protected $primaryKey = 'ID_TKESEHATAN';
    protected $fillable = ['ID_TKESEHATAN','ID_PENGGUNA', 'NOMOR_IZIN_PRAKTIK', 'TANGGAL_KADALUARSA_IZIN_PRAKTIK', 'NAMA', 'JENIS_KELAMIN', 'EMAIL', 'SPESIALISASI', 'GAJI', 'STATUS'];
    public $timestamps = false;
}

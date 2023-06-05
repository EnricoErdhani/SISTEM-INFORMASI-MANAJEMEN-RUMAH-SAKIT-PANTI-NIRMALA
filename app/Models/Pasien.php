<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = "pasien";
    protected $primaryKey = 'ID_PASIEN';
    protected $fillable = ['ID_PASIEN','ID_DOKTER', 'ID_KAMAR', 'NAMA', 'ALAMAT', 'TANGGAL_LAHIR', 'JENIS_KELAMIN', 'UMUR', 'NOMOR_TELEPON', 'EMAIL', 'RIWAYAT_PENYAKIT'];
    public $timestamps = false;
}

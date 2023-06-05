<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan_Dokter extends Model
{
    use HasFactory;
    protected $table = "pemeriksaan_dokter";
    protected $primaryKey = 'ID_PEMERIKSAAN';
    protected $fillable = ['ID_PEMERIKSAAN', 'ID_PASIEN', 'ID_DOKTER', 'TANGGAL', 'KELUHAN', 'HASIL_PEMERIKSAAN', 'RESEP_OBAT', 'BIAYA', 'JENIS_PEMERIKSAAN'];
    public $timestamps = false;
}

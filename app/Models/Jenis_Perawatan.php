<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Perawatan extends Model
{
    use HasFactory;
    protected $table = "jenis_perawatan";
    protected $primaryKey = 'ID_JPERAWATAN';
    protected $fillable = ['ID_JPERAWATAN', 'NAMA_PERAWATAN', 'DESKRIPSI', 'KATEGORI', 'DURASI', 'BIAYA', 'PERSYARATAN', 'KONTRAINDIKASI', 'DOKTER', 'JUMLAH_PASIEN'];
    public $timestamps = false;
}

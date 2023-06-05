<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = "pembayaran";
    protected $primaryKey = 'ID_PEMBAYARAN';
    protected $fillable = ['ID_PEMBAYARAN','ID_PASIEN', 'ID_DOKTER', 'ID_TKESEHATAN', 'ID_JPERAWATAN', 'ID_PEMERIKSAAN', 'ID_OBAT', 'ID_KAMAR'];
    public $timestamps = false;
}

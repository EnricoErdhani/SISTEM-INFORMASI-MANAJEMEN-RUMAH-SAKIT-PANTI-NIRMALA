<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    use HasFactory;
    protected $table = "obat";
    protected $primaryKey = 'ID_OBAT';
    protected $fillable = ['ID_OBAT','NAMA_OBAT', 'KATEGORI', 'DESKRIPSI', 'BENTUK_OBAT', 'DOSIS', 'CARA_PEMAKAIAN', 'KOMPOSISI', 'TANGGAL_KADALUARSA', 'HARGA', 'JUMLAH_STOK'];
    public $timestamps = false;
}

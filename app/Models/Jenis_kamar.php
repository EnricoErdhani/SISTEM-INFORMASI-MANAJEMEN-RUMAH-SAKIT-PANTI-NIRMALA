<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_kamar extends Model
{
    use HasFactory;
    protected $table = "jenis_kamar";
    protected $primaryKey = 'ID_JKAMAR';
    protected $fillable = ['ID_JKAMAR','NAMA_KAMAR','FASILITAS','HARGA','KETERSEDIAN'];
    public $timestamps = false;
}

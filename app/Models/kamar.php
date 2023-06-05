<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kamar extends Model
{
    use HasFactory;
    protected $table = "kamar";
    protected $primaryKey = 'ID_KAMAR';
    protected $fillable = ['ID_KAMAR','ID_JKAMAR','NAMA_KAMAR'];
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class minggu1 extends Model
{
    use HasFactory;

     protected $fillable = [
        'bb','tb','imt','nama',
        'frekuensi_makan','frekuensi_lainnya',
        'gorengan','manis','fastfood',
        'sayur','buah',
        'porsi','porsi_lainnya',
        'waktu_makan_malam','waktu_lainnya',
        'olahraga','jenis_olahraga','jenis_lainnya',
        'frekuensi_olahraga','durasi_olahraga',
        'tidur','air','ngemil',
        'keluhan','catatan'
    ];

    protected $casts = [
        'jenis_olahraga' => 'array'
    ];
}

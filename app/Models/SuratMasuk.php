<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'surat_masuks';
    protected $fillable = [
        'nomorSurat',
        'tanggalMasuk',
        'asalSurat',
        'perihal',
        'fileSurat',
       
    ];
}



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table = 'surat_masuks';
    protected $fillable = [
        'username',
        'password',
    ];
}

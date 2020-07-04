<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $fillable = ['namaberkas', 'jenisArsip', 'tanggal', 'inputfile'];
}

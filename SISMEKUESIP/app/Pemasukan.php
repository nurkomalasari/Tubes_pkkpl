<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    protected $fillable = ['nominal_pemasukan', 'jenis_pemasukan', 'tanggal', 'keterangan'];
}

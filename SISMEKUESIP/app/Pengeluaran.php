<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $fillable = ['nominal_pengeluaran','jenis_pengeluaran','tanggal','keterangan','buktipengeluaran'];
}

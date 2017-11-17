<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarUlang extends Model
{
    protected $table = 'biayapendaftaran';
    protected $fillable = ['nim','tanggalBayar','jumlahBayar','sisa','status'];
}

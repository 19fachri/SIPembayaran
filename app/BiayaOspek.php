<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BiayaOspek extends Model
{
    protected $table = 'biayaospek';
    protected $fillable = ['nim','tanggalBayar','jumlahBayar','sisa','status'];
}

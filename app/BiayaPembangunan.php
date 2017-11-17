<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BiayaPembangunan extends Model
{
    protected $table = 'biayapembangunan';
    protected $fillable = ['nim','tanggalBayar','jumlahBayar','sisa','status'];
}

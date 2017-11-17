<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BiayaSpp extends Model
{
    protected $table = 'biayaspp';
    protected $fillable = ['nim','tanggalBayar','jumlahBayar','sisa','status','semester'];
}

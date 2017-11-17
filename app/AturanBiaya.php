<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AturanBiaya extends Model
{
    protected $table = 'aturanbiaya';
    protected $fillable = ['tahunMulai','jumlah','keterangan'];
}

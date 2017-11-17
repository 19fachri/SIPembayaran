<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DaftarUlang;
use App\BiayaOspek;
use App\BiayaPembangunan;
use App\BiayaSpp;
use App\AturanBiaya;

class PembayaranController extends Controller
{
    public function aturanPembayaran()
    {
    	$data = AturanBiaya::orderBy('tahunMulai','DESC')->paginate(10);
    	return $data;
    }

    public function aturanPembayaranKategori($keterangan)
    {
    	if($keterangan == 'semua'){
    		$data = AturanBiaya::orderBy('tahunMulai','DESC')->paginate(10);
    	}else{
    		$data = AturanBiaya::where('keterangan','=',$keterangan)->orderBy('tahunMulai','DESC')->paginate(10);
    	}
    	return $data;
    }

    public function aturanBaru(Request $request)
    {
    	$data = new AturanBiaya();
    	$data->keterangan = $request->input('keterangan');
    	$data->jumlah = $request->input('jumlah');
    	$data->tahunMulai = $request->input('tahunMulai');
    	if($data->save()){
    		return "success";
    	}else{
    		return "error";
    	}
    }
}

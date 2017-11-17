<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mahasiswa;
use App\DaftarUlang;
use App\BiayaOspek;
use App\BiayaPembangunan;
use App\BiayaSpp;
use App\AturanBiaya;

class MahasiswaController extends Controller
{
    public function index()
    {
    	$data = Mahasiswa::paginate(10);
    	return $data;
    }

    public function mahasiswaSearch($cari)
    {
    	$data = Mahasiswa::where('nama','LIKE','%'.$cari.'%')->orWhere('nim','LIKE','%'.$cari.'%')->paginate(10);
    	return $data;
    }

    public function mahasiswaKategori($cari)
    {
    	if($cari == "semua"){
    		$data = Mahasiswa::paginate(10);
    		return $data;
    	}else{
	    	$data = Mahasiswa::where('status','=',$cari)->paginate(10);
	    	return $data;    		
    	}
    }

    public function biayaDaftarUlang($nim)
    {
    	$data = DaftarUlang::where('nim','=',$nim)->get();
    	return $data;
    }

    public function biayaOspek($nim)
    {
    	$data = BiayaOspek::where('nim','=',$nim)->get();
    	return $data;
    }

    public function biayaPembangunan($nim)
    {
    	$data = BiayaPembangunan::where('nim','=',$nim)->get();
    	return $data;
    }

    public function biayaSpp($nim)
    {
    	$data = BiayaSpp::where('nim','=',$nim)->get();
    	return $data;
    }

    public function mahasiswaProfil($nim)
    {
        $data = Mahasiswa::where('nim','=',$nim)->first();
        return $data;
    }

    public function pembayaranSppTerakhir($nim)
    {
        $data = [];
        $mahasiswa = Mahasiswa::where('nim','=',$nim)->first();
        $aturanSpp = AturanBiaya::where('tahunMulai','<=',$mahasiswa->tahunMasuk)->where('keterangan','=','spp')->orderBy('id','DESC')->first();
        $spp1 = BiayaSpp::where('nim','=',$nim)->orderBy('tanggalBayar','DESC')->get();
        $spp = collect($spp1);
        if($spp->isEmpty()){
            $data['semester'] = 1;
            $data['sisa'] = $aturanSpp->jumlah;
            $data['status'] = 'belum lunas';
            $data['aturan'] = $aturanSpp->jumlah;
            $data['pembayaranTerakhir'] = 0;
        }else{
            $sppTerakhir = $spp->first();
            if($sppTerakhir->status == 'lunas'){
                $data['semester'] = $sppTerakhir->semester + 1;
                $data['sisa'] = $aturanSpp->jumlah;
                $data['status'] = 'belum lunas';
                $data['aturan'] = $aturanSpp->jumlah;
                $data['pembayaranTerakhir'] = 0;
            }else{
                $data['semester'] = $sppTerakhir->semester;
                $data['sisa'] = $aturanSpp->jumlah - $spp->where('semester','=',$sppTerakhir->semester)->sum('jumlahBayar');
                $data['status'] = 'belum lunas';
                $data['aturan'] = $aturanSpp->jumlah;
                $data['pembayaranTerakhir'] = $spp->where('semester','=',$sppTerakhir->semester)->sum('jumlahBayar');
            }
        }
        return response()->json($data);
    }

    public function pembayaranPembangunanTerakhir($nim)
    {
        $data = [];
        $mahasiswa = Mahasiswa::where('nim','=',$nim)->first();
        $aturanPembangunan = AturanBiaya::where('tahunMulai','<=',$mahasiswa->tahunMasuk)->where('keterangan','=','pembangunan')->orderBy('id','DESC')->first();
        $pembangunan1 = BiayaPembangunan::where('nim','=',$nim)->orderBy('tanggalBayar','DESC')->get();
        $pembangunan = collect($pembangunan1);
        if($pembangunan->isEmpty()){
            $data['sisa'] = $aturanPembangunan->jumlah;
            $data['status'] = 'belum lunas';
            $data['aturan'] = $aturanPembangunan->jumlah;
            $data['pembayaranTerakhir'] = 0;
        }else{
            $pembangunanTerakhir = $pembangunan->first();
            if($pembangunanTerakhir->status == 'lunas'){
                $data['sisa'] = $aturanPembangunan->jumlah;
                $data['status'] = 'belum lunas';
                $data['aturan'] = $aturanPembangunan->jumlah;
                $data['pembayaranTerakhir'] = 0;
            }else{
                $data['sisa'] = $aturanPembangunan->jumlah - $pembangunan->sum('jumlahBayar');
                $data['status'] = 'belum lunas';
                $data['aturan'] = $aturanPembangunan->jumlah;
                $data['pembayaranTerakhir'] = $pembangunan->sum('jumlahBayar');
            }
        }
        return response()->json($data);
    }

    public function pembayaranOspekTerakhir($nim)
    {
        $data = [];
        $mahasiswa = Mahasiswa::where('nim','=',$nim)->first();
        $aturanOspek = AturanBiaya::where('tahunMulai','<=',$mahasiswa->tahunMasuk)->where('keterangan','=','ospek')->orderBy('id','DESC')->first();
        $ospek1 = BiayaOspek::where('nim','=',$nim)->orderBy('tanggalBayar','DESC')->get();
        $ospek = collect($ospek1);
        if($ospek->isEmpty()){
            $data['sisa'] = $aturanOspek->jumlah;
            $data['status'] = 'belum lunas';
            $data['aturan'] = $aturanOspek->jumlah;
            $data['pembayaranTerakhir'] = 0;
        }else{
            $osepkTerakhir = $ospek->first();
            if($osepkTerakhir->status == 'lunas'){
                $data['sisa'] = $aturanOspek->jumlah;
                $data['status'] = 'belum lunas';
                $data['aturan'] = $aturanOspek->jumlah;
                $data['pembayaranTerakhir'] = 0;
            }else{
                $data['sisa'] = $aturanOspek->jumlah - $ospek->sum('jumlahBayar');
                $data['status'] = 'belum lunas';
                $data['aturan'] = $aturanOspek->jumlah;
                $data['pembayaranTerakhir'] = $ospek->sum('jumlahBayar');
            }
        }
        return response()->json($data);
    }

    public function pembayaranDaftarUlangTerakhir($nim)
    {
        $data = [];
        $mahasiswa = Mahasiswa::where('nim','=',$nim)->first();
        $aturandaftarUlang = AturanBiaya::where('tahunMulai','<=',$mahasiswa->tahunMasuk)->where('keterangan','=','daftarUlang')->orderBy('id','DESC')->first();
        $daftarUlang1 = BiayaOspek::where('nim','=',$nim)->orderBy('tanggalBayar','DESC')->get();
        $daftarUlang = collect($daftarUlang1);
        if($daftarUlang->isEmpty()){
            $data['sisa'] = $aturandaftarUlang->jumlah;
            $data['status'] = 'belum lunas';
            $data['aturan'] = $aturandaftarUlang->jumlah;
            $data['pembayaranTerakhir'] = 0;
        }else{
            $daftarUlangTerakhir = $daftarUlang->first();
            if($daftarUlangTerakhir->status == 'lunas'){
                $data['sisa'] = $aturandaftarUlang->jumlah;
                $data['status'] = 'belum lunas';
                $data['aturan'] = $aturandaftarUlang->jumlah;
                $data['pembayaranTerakhir'] = 0;
            }else{
                $data['sisa'] = $aturandaftarUlang->jumlah - $daftarUlang->sum('jumlahBayar');
                $data['status'] = 'belum lunas';
                $data['aturan'] = $aturandaftarUlang->jumlah;
                $data['pembayaranTerakhir'] = $daftarUlang->sum('jumlahBayar');
            }
        }
        return response()->json($data);
    }

    public function pembayaranSpp(Request $request, $nim)
    {
        $data = new BiayaSpp();
        $data->nim = $nim;
        $data->tanggalBayar = Carbon::today()->toDateString();
        $data->jumlahBayar = $request->input('jumlahBayar');
        $data->sisa = $request->input('sisa');
        $data->semester = $request->input('semester');
        $data->status = $request->input('status');
        $data->save();
        return "sukses";
    }

    public function pembayaranPembangunan(Request $request, $nim)
    {
        $data = new BiayaPembangunan();
        $data->nim = $nim;
        $data->tanggalBayar = Carbon::today()->toDateString();
        $data->jumlahBayar = $request->input('jumlahBayar');
        $data->sisa = $request->input('sisa');
        $data->status = $request->input('status');
        $data->save();
        return "sukses";
    }

    public function pembayaranOspek(Request $request, $nim)
    {
        $data = new BiayaOspek();
        $data->nim = $nim;
        $data->tanggalBayar = Carbon::today()->toDateString();
        $data->jumlahBayar = $request->input('jumlahBayar');
        $data->sisa = $request->input('sisa');
        $data->status = $request->input('status');
        $data->save();
        return "sukses";
    }

    public function pembayaranDaftarUlang(Request $request, $nim)
    {
        $data = new DaftarUlang();
        $data->nim = $nim;
        $data->tanggalBayar = Carbon::today()->toDateString();
        $data->jumlahBayar = $request->input('jumlahBayar');
        $data->sisa = $request->input('sisa');
        $data->status = $request->input('status');
        $data->save();
        return "sukses";
    }
}

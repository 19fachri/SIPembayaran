<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function pdfview($kategori, $id)
    {
		PDF::loadView('pdf/buktiPembayaran')->save('my_stored_file.pdf')->stream('download.pdf');
		return response()->file('my_stored_file.pdf');
    }
}

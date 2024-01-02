<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_barang;
use Illuminate\Support\Facades\DB;


class UtamaController extends Controller
{
    public function index(){
        $barang = DB::table('tbl_barang')->get();
        return view('Utama', ['barang' => $barang]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'file' => 'required|max:10048',
            // Pastikan ada validasi untuk field lainnya jika diperlukan
        ]);

        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'data_file';

        if ($file->isValid()) {
            // File valid, lanjutkan dengan proses penyimpanan
            $file->move($tujuan_upload, $nama_file);

            // Simpan data ke dalam database setelah file tersimpan
            $data = M_barang::create([
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'gambar' => $nama_file
            ]);

            // Berikan respons sukses atau lanjutkan ke langkah berikutnya
            return response()->json(['message' => 'File berhasil diunggah dan data berhasil disimpan', $data]);
        } else {
            // Jika file tidak valid, berikan respons error atau lakukan penanganan sesuai kebutuhan
            return response()->json(['message' => 'File tidak valid'], 400); // 400: Bad Request
        }
    }

}

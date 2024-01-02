<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function Order(Request $request){
        DB::table('tbl_keranjang')->insert([
            'id_user' => Session::get('id_user'),
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah
        ]);
        return redirect('/');
    }

    public function Keranjang(){
        $keranjang = DB::table('keranjang')->get();
        return view('keranjang',['keranjang'=> $keranjang]);
    }

    public function Checkout(){
        $id_checkout = uniqid(); // Menggunakan uniqid() untuk mendapatkan ID checkout unik
        $total = 0;

        // Mendapatkan data keranjang untuk pengguna yang sedang login
        $keranjangItems = DB::table('tbl_keranjang')
            ->where('id_user', Session::get('id_user'))
            ->get();

        // Menghitung total belanja
        foreach ($keranjangItems as $item) {
            $barang = DB::table('tbl_barang')
                ->where('id', $item->id_barang)
                ->first();

            if ($barang && isset($item->jumlah) && is_numeric($item->jumlah) && $item->jumlah > 0) {
                $subtotal = $item->jumlah * $barang->harga;
                $total += $subtotal;

                // Memasukkan detail checkout
                DB::table('detail_checkout')->insert([
                    'id_checkout' => $id_checkout,
                    'id_barang' => $item->id_barang,
                    'jumlah' => $item->jumlah
                ]);
            }
        }

        // Memasukkan data checkout utama
        DB::table('tbl_checkout')->insert([
            'id_checkout' => $id_checkout,
            'id_user' => Session::get('id_user'),
            'total' => $total
        ]);
        return redirect('/Checkout_list');
    }


    public function Checkout_list(){
        $checkout = DB::table('checkout')->get();
        return view('Checkout', ['checkout' => $checkout]);
    }

    public function Confirm(){
        return view('Confirm');
    }

    public function Confirm_simpan(Request $request) {
        $this->validate($request, [
            'file'=> 'required|max:5048'
        ]);
        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'data_file';

        if($file->move($tujuan_upload,$nama_file)){
            DB::table('tbl_konfirmasi')->insert([
                'id_user' => Session::get('id_user'),
                'id_checkout' => $request->id_token,
                'bukti' =>$nama_file
            ]);
            return redirect('/Confirm');
        }
    }


}

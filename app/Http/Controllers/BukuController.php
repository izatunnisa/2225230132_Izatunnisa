<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model BukuModel
use App\Models\Buku;

class BukuController extends Controller
{
    //method untuk tampil data buku
    public function bukutampil(){
        $daftarBuku = Buku::all(); 
        return view('halaman/view_buku', ['buku'=>$daftarBuku]);
    }

    public function bukutambah(Request $request) {
        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->pengarang = $request->pengarang;
        $buku->penerbit = $request->penerbit;
        $buku->genre = $request->genre;
        $buku->save();
        return redirect('/buku');
    }

    public function bukuhapus($id){
        $dataBuku = Buku::findOrfail($id);
        $dataBuku->delete();
        return redirect('/buku');
    }

    public function bukuedit(Request $request, $id) {
        $buku = Buku::findOrfail($id);
        $buku->judul = $request->judul;
        $buku->pengarang = $request->pengarang;
        $buku->penerbit = $request->penerbit;
        $buku->genre = $request->genre;
        $buku->save();
        return redirect('/buku');
    }
    
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    public function index(){
        $datas = Kategori::all();
        return view('kategori.index', compact('datas'));
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',   ],  ['nama.required' => 'Nama harus diisi !',   ]);
        
        $model = new Kategori;
        $model->nama = $request->nama;
        $model->save();
        Alert::success('Sukses', 'Berhasil Menambahkan Data');
        return redirect('kategori');
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama' => 'required',   ],  ['nama.required' => 'Nama harus diisi !',   ]);
        
        $model = Kategori::find($id);
        $model->nama = $request->nama;
        $model->save();
        Alert::success('Sukses', 'Berhasil Mengedit Data');
        return redirect('kategori');
    }

    public function destroy($id){
        $model = Kategori::find($id);
        $model->delete();
        Alert::warning('Sukses', 'Berhasil Menghapus Data');
        return redirect('kategori');
    }
}

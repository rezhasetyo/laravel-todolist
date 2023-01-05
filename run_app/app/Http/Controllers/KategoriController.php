<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class KategoriController extends Controller
{   
    public function __construct()   {
        $this->middleware('auth')->except(['index']);
    }

    public function index(){
        if (Auth::user()) {
            $datas = Kategori::where('user_id', auth()->id())->get();
        } else {
            $datas = Kategori::where('user_id', "999")->get();
        }
        
        return view('kategori.index', compact('datas'));
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',   ],  ['nama.required' => 'Nama harus diisi !',   ]);
        
        $model = new Kategori;
        $model->nama = $request->nama;
        $model->user_id = Auth::user()->id;
        $model->save();
        Alert::success('Sukses', 'Berhasil Menambahkan Data');
        return redirect('kategori');
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama' => 'required',   ],  ['nama.required' => 'Nama harus diisi !',   ]);
        
        $model = Kategori::find($id);
        $model->nama = $request->nama;
        $model->user_id = Auth::user()->id;
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

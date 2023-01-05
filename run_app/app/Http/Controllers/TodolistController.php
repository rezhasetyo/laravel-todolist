<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Tanggal;
use App\Models\Todolist;
// use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class TodolistController extends Controller
{   
    public function __construct()   {
        $this->middleware('auth')->except(['index']);
    }

    public function index(){
        if (Auth::user()) {
            $datas      = Todolist::where('user_id', auth()->id())->get();
            $kategori   = Kategori::where('user_id', auth()->id())->get();
            $tanggal    = Tanggal::where('user_id', auth()->id())->get();
        } else {
            $datas      = Todolist::where('user_id', "999")->get();
            $kategori   = Kategori::where('user_id', "999")->get();
            $tanggal    = Tanggal::where('user_id', "999")->get();
        }
        
        
        return view('todolist.index', compact('datas', 'kategori', 'tanggal'));
    }

    public function store(Request $request){
        $request->validate([
            'todolist' => 'required',
            'durasi' => 'required',   
            'kategori_id' => 'required',
            'tanggal_id' => 'required', 
            ],  
            ['todolist.required' => 'Nama harus diisi !',
            'durasi.required' => 'Durasi harus diisi !',
            'kategori_id.required' => 'Kategori harus diisi !',
            'tanggal_id.required' => 'Tanggal harus diisi !',  
        ]);
        
        $model = new Todolist;
        $model->todolist = $request->todolist;
        $model->durasi = $request->durasi;
        $model->kategori_id = $request->kategori_id;
        $model->tanggal_id = $request->tanggal_id;
        $model->user_id = Auth::user()->id;
        $model->save();

        Alert::success('Sukses', 'Berhasil Menambahkan Data');
        return redirect('todolist');
    }

    public function update(Request $request, $id){
        $request->validate([
            'todolist' => 'required',
            'durasi' => 'required',   
            'kategori_id' => 'required',
            'tanggal_id' => 'required', 
            ],  
            ['todolist.required' => 'Nama harus diisi !',
            'durasi.required' => 'Durasi harus diisi !',
            'kategori_id.required' => 'Kategori harus diisi !',
            'tanggal_id.required' => 'Tanggal harus diisi !',  
        ]);
        
        $model = Todolist::find($id);
        $model->todolist = $request->todolist;
        $model->durasi = $request->durasi;
        $model->kategori_id = $request->kategori_id;
        $model->tanggal_id = $request->tanggal_id;
        $model->user_id = Auth::user()->id;
        $model->save();

        // $tanggal = Tanggal::find($request->tanggal_id);
        // $total   = DB::table("todolist")->get()->where('tanggal_id', $tanggal->id)
        //                     ->sum('durasi');
        // $tanggal->total = $total;                    
        // $tanggal->save();

        Alert::success('Sukses', 'Berhasil Mengedit Data');
        return redirect('todolist');
    }

    public function destroy($id){
        $model = Todolist::find($id);
        $model->delete();
        Alert::warning('Sukses', 'Berhasil Menghapus Data');
        return redirect('todolist');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanggal;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class TanggalController extends Controller
{   
    public function __construct()   {
        $this->middleware('auth')->except(['index']);
    }

    public function index(){
        if (Auth::user()) {
            $datas = Tanggal::where('user_id', auth()->id())->get();
        } else {
            $datas = Tanggal::where('user_id', "999")->get();
        }
        
        return view('tanggal.index', compact('datas'));
    }

    public function store(Request $request){
        $request->validate(
            ['tanggal' => 'required'],   ['tanggal.required' => 'Tanggal harus diisi !']
        );
        
        $model = new Tanggal;
        $model->tanggal = $request->tanggal;
        $model->user_id = Auth::user()->id;
        $model->save();
        Alert::success('Sukses', 'Berhasil Menambahkan Data');
        return redirect('tanggal');
    }

    public function update(Request $request, $id){
        $request->validate(
            ['tanggal' => 'required'],   ['tanggal.required' => 'Tanggal harus diisi !']
        );
        
        $model = Tanggal::find($id);
        $model->tanggal = $request->tanggal;
        $model->user_id = Auth::user()->id;
        $model->save();
        Alert::success('Sukses', 'Berhasil Mengedit Data');
        return redirect('tanggal');
    }

    public function destroy($id){
        $model = Tanggal::find($id);
        $model->delete();
        Alert::warning('Sukses', 'Berhasil Menghapus Data');
        return redirect('tanggal');
    }

    public function totalJam($id){
        $tanggal = Tanggal::find($id);
        $total   = DB::table("todolist")->get()->where('tanggal_id', $tanggal->id)
                            ->sum('durasi');
        $tanggal->total = $total;                    
        $tanggal->save();

        Alert::success('Sukses', 'Perhitungan Total Jam Sukses');
        return redirect()->back();
    }
}
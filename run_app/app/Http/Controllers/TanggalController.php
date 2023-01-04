<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanggal;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class TanggalController extends Controller
{
    public function index(){
        $datas = Tanggal::all();
        return view('tanggal.index', compact('datas'));
    }

    public function store(Request $request){
        $request->validate(
            ['tanggal' => 'required|unique:tanggal']
            ,
            ['tanggal.required' => 'Tanggal harus diisi !',
            'tanggal.unique' => 'Tanggal sudah ada']
        );
        
        $model = new Tanggal;
        $model->tanggal = $request->tanggal;
        $model->save();
        Alert::success('Sukses', 'Berhasil Menambahkan Data');
        return redirect('tanggal');
    }

    public function update(Request $request, $id){
        $request->validate(
            ['tanggal' => 'required|unique:tanggal']
            ,
            ['tanggal.required' => 'Tanggal harus diisi !',
            'tanggal.unique' => 'Tanggal sudah ada']
        );
        
        $model = Tanggal::find($id);
        $model->tanggal = $request->tanggal;
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
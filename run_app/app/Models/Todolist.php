<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;
    protected $table    = 'todolist';
    protected $fillable = ['todolist', 'durasi', 'kategori_id', 'tanggal_id'];

    public function kategori(){
        return $this->belongsTo(Kategori::class); 
    }

    public function tanggal(){
        return $this->belongsTo(Tanggal::class); 
    }
}

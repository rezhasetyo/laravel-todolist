<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggal extends Model
{
    use HasFactory;
    protected $table    = 'tanggal';
    protected $fillable = ['tanggal', 'total'];
    protected $casts = [ 'tanggal'=>'datetime'];

    public function todolist(){
        return $this->hasMany(Todolist::class); 
    }

    public function user(){
        return $this->belongsTo(User::class); 
    }
}
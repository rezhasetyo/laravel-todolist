<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggal extends Model
{
    use HasFactory;
    protected $table    = 'tanggal';
    protected $fillable = ['tanggal', 'total'];

    public function todolist(){
        return $this->hasMany(Todolist::class); 
    }
}

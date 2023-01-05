<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;
use App\Models\Tanggal;
use App\Models\Todolist;
use App\Models\User;

class Seeder999 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->id = 999;
        $user->name = "Alex Turner";
        $user->email = "alex@gmail.com";
        $user->password = bcrypt('rahasia123');
        $user->save();

        $kategori_1 = new Kategori;
        $kategori_1 -> id = 888;
        $kategori_1 -> nama = "Belajar Memancing";
        $kategori_1 -> user_id = "999";
        $kategori_1 -> save();

        $kategori_2 = new Kategori;
        $kategori_2 -> id = 870;
        $kategori_2 -> nama = "Belajar Memasak";
        $kategori_2 -> user_id = "999";
        $kategori_2 -> save();

        $tanggal = new Tanggal;
        $tanggal->id = 999;
        $tanggal->tanggal = "2023-01-11 00:00:00";
        $tanggal->total = "5";
        $tanggal->user_id = "999";
        $tanggal->save();

        $todolist_1 = new Todolist;
        $todolist_1 -> id = 1111;
        $todolist_1 -> todolist = "Memancing Ikan Lele";
        $todolist_1 -> durasi = "2";
        $todolist_1 -> kategori_id = "888";
        $todolist_1 -> tanggal_id = "999";
        $todolist_1 -> user_id = "999";
        $todolist_1 -> save();

        $todolist_2 = new Todolist;
        $todolist_2 -> id = 1112;
        $todolist_2 -> todolist = "Memancing Ikan Hiu";
        $todolist_2 -> durasi = "2";
        $todolist_2 -> kategori_id = "888";
        $todolist_2 -> tanggal_id = "999";
        $todolist_2 -> user_id = "999";
        $todolist_2 -> save();

        $todolist_3 = new Todolist;
        $todolist_3 -> id = 1113;
        $todolist_3 -> todolist = "Memasak Ikan Lele";
        $todolist_3 -> durasi = "1";
        $todolist_3 -> kategori_id = "870";
        $todolist_3 -> tanggal_id = "999";
        $todolist_3 -> user_id = "999";
        $todolist_3 -> save();
    }
}

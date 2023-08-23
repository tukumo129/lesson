<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('INSERT INTO menus (category_id,menu_no,menu_name,price,icon)VALUES(1,100,"うどん",400,"")');
        DB::insert('INSERT INTO menus (category_id,menu_no,menu_name,price,icon)VALUES(2,200,"親子丼",700,"")');
        DB::insert('INSERT INTO menus (category_id,menu_no,menu_name,price,icon)VALUES(3,300,"ステーキ",1000,"")');
        DB::insert('INSERT INTO menus (category_id,menu_no,menu_name,price,icon)VALUES(4,400,"サバの味噌煮",600,"")');
        DB::insert('INSERT INTO menus (category_id,menu_no,menu_name,price,icon)VALUES(5,500,"シーザーサラダ",500,"")');
        DB::insert('INSERT INTO menus (category_id,menu_no,menu_name,price,icon)VALUES(6,600,"プリンパフェ",800,"")');
        DB::insert('INSERT INTO menus (category_id,menu_no,menu_name,price,icon)VALUES(7,700,"メロンソーダ",200,"")');
    }
}

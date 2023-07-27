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
        DB::insert('INSERT INTO menus (category_id,menu_no,menu_name,price,icon)VALUES(14,100,"親子丼",700,"")');
        DB::insert('INSERT INTO menus (category_id,menu_no,menu_name,price,icon)VALUES(15,200,"ステーキ",1000,"")');
        DB::insert('INSERT INTO menus (category_id,menu_no,menu_name,price,icon)VALUES(17,300,"シーザーサラダ",600,"")');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('INSERT INTO categories (category_no,category_name)VALUES(100,"麺類")');
        DB::insert('INSERT INTO categories (category_no,category_name)VALUES(200,"ごはん料理")');
        DB::insert('INSERT INTO categories (category_no,category_name)VALUES(300,"肉料理")');
        DB::insert('INSERT INTO categories (category_no,category_name)VALUES(400,"魚料理")');
        DB::insert('INSERT INTO categories (category_no,category_name)VALUES(500,"サラダ")');
        DB::insert('INSERT INTO categories (category_no,category_name)VALUES(600,"スイーツ")');
        DB::insert('INSERT INTO categories (category_no,category_name)VALUES(700,"飲み物")');
    }
}

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
        DB::insert('INSERT INTO categories (id,category_no,category_name)VALUES(1,100,"麺類")');
        DB::insert('INSERT INTO categories (id,category_no,category_name)VALUES(2,200,"ごはん料理")');
        DB::insert('INSERT INTO categories (id,category_no,category_name)VALUES(3,300,"肉料理")');
        DB::insert('INSERT INTO categories (id,category_no,category_name)VALUES(4,400,"魚料理")');
        DB::insert('INSERT INTO categories (id,category_no,category_name)VALUES(5,500,"サラダ")');
        DB::insert('INSERT INTO categories (id,category_no,category_name)VALUES(6,600,"スイーツ")');
        DB::insert('INSERT INTO categories (id,category_no,category_name)VALUES(7,700,"飲み物")');
    }
}

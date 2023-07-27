<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Menu extends Model
{
    use HasFactory;

    function getSelectMenu() {
        $array = Session::get('category_list', []);
        if(empty($array)) {
            $menus = Menu::get();
        } else {
            $menus = Menu::whereIn('category_id',$array)->get();
        }
        return $menus;
    }

    static function getMenuFromId($array) {
        return Menu::whereIn('id',$array)->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Category extends Model
{
    use HasFactory;
    function getCategorys() {
        return Category::get();
    }
    function categoryListAdd($id) {
        // Session::flush();
        $array = Session::get('category_list', []);
        $delete_key = array_search($id,$array);
        if($delete_key === false) {
            $array[] = $id;
        } else {
            array_splice($array, $delete_key, 1);
        }
        Session::put('category_list', $array);
        return $array;
    }

    function isClicked() {
        $array = Session::get('category_list', []);
        if(in_array($this->id,$array)) {
            return 'btn-primary';
        } else {
            return 'btn-outline-primary';
        }
    }
}

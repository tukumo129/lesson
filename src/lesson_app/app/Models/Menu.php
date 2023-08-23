<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Menu extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

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

    public function getMenuById($menuId) {
        return Menu::where('id',$menuId)->first();
    }
    public function deleteMenuById($menuId) {
        return Menu::where('id',$menuId)->delete();
    }

    public function createMenu($menuArray,$icon) {
        $categoryId = $menuArray['category_id'] ?? null;
        $menuNo = $menuArray['menu_no'] ?? null;
        $menuName = $menuArray['menu_name'] ?? null;
        $iconName = time() . '.' . $icon->getClientOriginalExtension();
        $icon->storeAs('public/images', $iconName);
        $price = $menuArray['price'] ?? null;

        $menu = new Menu();
        $menu->category_id = $categoryId;
        $menu->menu_no = $menuNo;
        $menu->menu_name = $menuName;
        $menu->icon = 'storage/images/' . $iconName;
        $menu->price = $price;
        $menu->save();

        return $menu->refresh();
    }
}

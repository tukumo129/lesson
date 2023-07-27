<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;

class GuestController extends Controller
{
    public function home() {
        return view('guest.home');
    }

    public function menu() {
        $category = new Category();
        $categorys = $category->getCategorys();

        $menu = new Menu();
        $menus = $menu->getSelectMenu();
        return view('guest.menu',[
            'categorys' => $categorys,
            'menus' => $menus
        ]);
    }

    public function list_add($id) {
        $category = new Category();
        $categoryList = $category->categoryListAdd($id);
        return redirect()->route('guest_menu');
    }

    public function order(Request $req) {
        $order_menu_ids = $req->input('order_menu');
        if(empty($order_menu_ids)) {
            return redirect()->route('guest_menu')->with('err_msg','メニューを選択してください');
        }
        $order_menus = Menu::getMenuFromId($order_menu_ids);
        return view('guest.order', [
            'menus' => $order_menus
        ]);
    }

    public function order_submit(Request $req) {
        $menus = $req->input('order_menu');
        foreach($menus as $menu) {
            $order = new Order();
            $order->menu_id = $menu;
            $order->table_seat_id = 1;
            $order->order_date_time = Now();
            $order->status = '0';
            $order->save();
        }
        return redirect()->route('guest_menu')->with('complete_msg','注文が完了しました');
    }
}

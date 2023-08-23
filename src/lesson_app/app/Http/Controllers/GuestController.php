<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;

class GuestController extends Controller
{
    public function firstPage($id) {
        Session::put('table_seat_id', $id);
        return view('guest.home');
    }

    public function home() {
        return view('guest.home');
    }

    public function menu() {
        $category = new Category();
        $categories = $category->getCategories();

        $menu = new Menu();
        $menus = $menu->getSelectMenu();
        return view('guest.menu',[
            'categories' => $categories,
            'menus' => $menus
        ]);
    }

    public function listAdd($id) {
        $category = new Category();
        $category->categoryListAdd($id);
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

    public function orderSubmit(Request $req) {
        $menus = $req->input('order_menu');
        $seatId = Session::get('table_seat_id');

        foreach($menus as $menu) {
            $order = new Order();
            $order->menu_id = $menu;
            $order->table_seat_id = $seatId;
            $order->order_date_time = Now();
            $order->status = $order::ORDER_NO_OFFER;
            $order->save();
        }
        return redirect()->route('guest_menu')->with('complete_msg','注文が完了しました');
    }

    public function orderList() {
        $seatId = Session::get('table_seat_id');
        $order = new Order();
        $orders = $order->getOrders($seatId);        
        return view('guest.order_list', [
            'orders' => $orders
        ]);
    }
}

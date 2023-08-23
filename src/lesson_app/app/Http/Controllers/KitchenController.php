<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;

class KitchenController extends Controller
{
    public function home() {
        return view('kitchen.home');
    }

    public function menuManagement() {
        $menus = Menu::get();
        return view('kitchen.menu_management',[
            'menus' => $menus,
        ]);
    }

    public function menuAction(Request $req) {
        $selectButton = $req->input('action');
        $menuId = $req->input('menu_id') ?? null;

        $category = new Category();
        $categories = $category->getCategories();

        if($selectButton === '登録'){
            return view('kitchen.menu_create',[
                'categories' => $categories
            ]);
        }

        //メニューが選択されていない場合エラー
        if(!$menuId) {
            return redirect()->route('kitchen_menu_management')->with('err_msg','メニューを選択してください');
        }

        $menu = new Menu();
        $selectMenu = $menu->getMenuById($menuId);

        if($selectButton === '編集'){
            return view('kitchen.menu_edit',[
                'menu' => $selectMenu,
            ]);
        }

        if($selectButton === '削除'){
            $menu->deleteMenuById($menuId);
            return redirect()->route('kitchen_menu_management')->with('complete_msg',$selectMenu->menu_name.'を削除しました');
        }
    }

    public function menuCreate(Request $req) {
        $menuArray = $req->input('menu');
        if ($req->hasFile('icon')) {
            $icon = $req->file('icon');
        }
        
        $menu = new Menu();
        $resultMenu = $menu->createMenu($menuArray,$icon);

        $category = new Category();
        $categories = $category->getCategories();

        return view('kitchen.menu_create',[
            'categories' => $categories
        ])->with('complete_msg',$resultMenu->menu_name.'を登録しました');
    }

    public function orderList () {
        $order = new Order();
        $orders = $order->getNoOfferOrders();
        return view('kitchen.order_list', [
            'orders' => $orders
        ]);
    }

    public function orderOffer(Request $req) {
        $orderId = $req->input('order_id');
        $order = new Order();
        $offerOrder = $order->getOrderById($orderId);
        $offerOrder->status = $order::ORDER_COMPLETE_OFFER;
        $offerOrder->save();
        return redirect()->route('kitchen_order_list');
    }
}

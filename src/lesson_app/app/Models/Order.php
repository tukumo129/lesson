<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const ORDER_NO_OFFER = 0;

    const ORDER_COMPLETE_OFFER = 1;

    public function menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }

    public function getOrders($seatId) {
        return Order::where('table_seat_id', $seatId)->get();
    }

    public function getNoOfferOrders() {
        return Order::where('status', self::ORDER_NO_OFFER)->get();
    }

    public function isChecked() {
        if($this->status == 1) {
            return 'checked';
        }
        return '';
    }
    public function getOrderById($id) {
        return Order::where('id', $id)->first();
    }
}

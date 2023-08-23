@extends('layouts.kitchen_base')
@section('head_title','注文管理')
@section('main_title','注文管理')
@section('main')
      <form method="POST" action="{{ route('kitchen_order_offer') }}">
            @csrf
            <div class="menu_list">
                  <table class="table">
                        <thead>
                        <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                              <input name="order_id" type="hidden" value="{{ $order->id }}">
                              <tr>                    
                              <td></td>
                              <td><img src=""></td>
                              <td><label for="">{{$order->menu->menu_name}}</label></td>
                              <td><input class="btn m-b btn-primary" type="submit" value="提供"></td>
                              </tr>
                        @endforeach
                        </tbody>
                  </table>
            </div>
      </from>
@endsection
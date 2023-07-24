@extends('layouts.base')
@section('head_title','メニュー')
@section('main_title','メニュー')
@section('main')
    <form method="POST" action="{{ route('guest_order_submit') }}">
        @csrf
        <div class="menu_list">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                        <input name="order_menu[]" type="hidden" value="{{ $menu->id }}">
                        <tr>
                        <th scope="row"></th>
                        <td><img src="{{$menu->icon}}"></td>
                        <td>{{$menu->menu_name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-grid gap-2 col-8 mx-auto">
            <input class="btn m-b btn-primary" type="submit" value="注文確定">
        </div>
    </from>
@endsection
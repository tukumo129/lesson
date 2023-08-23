@extends('layouts.base')
@section('head_title','メニュー')
@section('main_title','メニュー')
@section('main')
    @if(session('complete_msg'))
        <p class="alert alert-success" role="alert">{{session('complete_msg')}}</p>
    @endif
    @if(session('err_msg'))
        <p class="alert alert-danger" role="alert">{{session('err_msg')}}</p>
    @endif
    <div class="category_select">
        @foreach($categories as $category)
            <a href="{{ route('guest_list_add',['id' => $category->id]) }}">
                <button class="m-1 btn {{ $category->isClicked() }} m-b">{{ $category->category_name }}</button>
            </a>
        @endforeach
    </div>
    <form method="POST" action="{{ route('guest_order') }}">
        @csrf
        <div class="menu_list">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                        <tr>
                        <th scope="row"><input type="checkbox" name="order_menu[]" value="{{$menu->id}}" id="{{$menu->id}}"></th>
                        
                        <td><img src="{{$menu->icon}}"></td>
                        <td><label for="{{$menu->id}}">{{$menu->menu_name}}</label></td>
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-grid gap-2 col-8 mx-auto">
            <input class="btn m-b btn-primary" type="submit" value="注文">
        </div>
    </from>
@endsection
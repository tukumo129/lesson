@extends('layouts.kitchen_base')
@section('head_title','メニュー管理')
@section('main_title','メニュー管理')
@section('main')
      @if(session('complete_msg'))
            <p class="alert alert-success" role="alert">{{session('complete_msg')}}</p>
      @endif
      @if(session('err_msg'))
            <p class="alert alert-danger" role="alert">{{session('err_msg')}}</p>
      @endif

      <form method="POST" action="{{ route('kitchen_menu_action') }}">
            @csrf
            <div class="menu_list">
                  <table class="table">
                        <thead>
                        <tr>
                        <th scope="col">選択</th>
                        <th scope="col">番号</th>
                        <th scope="col">カテゴリー</th>
                        <th scope="col">名前</th>
                        <th scope="col">アイコン</th>
                        <th scope="col">価格</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($menus as $menu)
                              <tr>
                              <td class="align-middle"><input class="form-check-input " type="radio" name="menu_id" value="{{ $menu->id }}" id="{{ $menu->id }}"></td>
                              <td class="align-middle"><label class="w-100 h-100" for="{{ $menu->id }}">{{$menu->menu_no}}</label></td>
                              <td class="align-middle"><label class="w-100 h-100" for="{{ $menu->id }}">{{$menu->category->category_name}}</label></td>
                              <td class="align-middle"><label class="w-100 h-100" for="{{ $menu->id }}">{{$menu->menu_name}}</label></td>
                              <td class="align-middle" style="width: 5rem; height: 5rem;" >
                                    @if(!empty($menu->icon))
                                          <img style="width: 5rem; height: 5rem;"  class="object-fit-cover border rounded" src="{{ asset($menu->icon) }}">
                                    @endif
                              </td>
                              <td class="align-middle"><label class="w-100 h-100" for="{{ $menu->id }}">{{$menu->price}}</label></td>
                              </tr>
                        @endforeach
                        </tbody>
                  </table>
            </div>
            <div class="text-center">
                  <input class="btn m-b btn-primary w-25 m-3" type="submit" value="登録" name="action">
                  <input class="btn m-b btn-primary w-25 m-3" type="submit" value="編集" name="action">
                  <input class="btn m-b btn-primary w-25 m-3" type="submit" value="削除" name="action">
            </div>
      </from>
@endsection
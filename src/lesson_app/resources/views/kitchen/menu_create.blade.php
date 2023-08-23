@extends('layouts.kitchen_base')
@section('head_title','メニュー管理：登録')
@section('main_title','メニュー管理：登録')
@section('main')
      @if(session('complete_msg'))
            <p class="alert alert-success" role="alert">{{session('complete_msg')}}</p>
      @endif
      @if(session('err_msg'))
            <p class="alert alert-danger" role="alert">{{session('err_msg')}}</p>
      @endif

      <form method="POST" action="{{ route('kitchen_menu_create') }}" enctype="multipart/form-data">
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
                              <tr>
                                    <td class="align-middle"><span>カテゴリー</span></td>
                                    <td>
                                          <select class="form-control" type="text" name="menu[category_id]">
                                                @foreach($categories as $category)
                                                      <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                          </select>
                                    </td>
                              </tr>
                              <tr>
                                    <td class="align-middle"><span>番号</span></td>
                                    <td><input class="form-control" type="number" name="menu[menu_no]"></td>
                              </tr>
                              <tr>
                                    <td class="align-middle"><span>名前</span></td>
                                    <td><input class="form-control" type="text" name="menu[menu_name]"></td>
                              </tr>
                              <tr>
                                    <td class="align-middle"><span>アイコン</span></td>
                                    <td><input class="custom-file-input" type="file" name="icon"></td>
                              </tr>
                              <tr>
                                    <td class="align-middle"><span>価格</span></td>
                                    <td><input class="form-control" type="number" name="menu[price]"></td>
                              </tr>
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
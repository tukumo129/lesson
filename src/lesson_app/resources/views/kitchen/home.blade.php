@extends('layouts.kitchen_base')
@section('head_title','ホーム')
@section('main_title','ホーム')
@section('main')
<div class="d-flex align-items-start flex-column bd-highlight mb-3">
      <a class="btn btn-primary w-100 m-2" href="{{route('kitchen_menu_management')}}" role="button">メニュー管理</a>
      <a class="btn btn-primary w-100 m-2" href="{{route('kitchen_order_list')}}" role="button">注文状況確認</a>
</div>
@endsection
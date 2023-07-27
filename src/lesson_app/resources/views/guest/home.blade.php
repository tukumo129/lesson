@extends('layouts.base')
@section('head_title','ホーム')
@section('main_title','ホーム')
@section('main')
<div class="d-flex align-items-start flex-column bd-highlight mb-3" style="height: 100%;">
  <div class="mb-auto p-2 bd-highlight col-8 mx-auto">
      <a class="btn btn-primary w-100" href="{{route('guest_menu')}}" role="button">メニュー</a>
  </div>
  <div class="p-2 bd-highlight col-8 mx-auto">
      <a class="btn btn-primary w-100" href="{{route('guest_menu')}}" role="button">注文状況</a>
  </div>
</div>
@endsection
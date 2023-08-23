@extends('layouts.base')
@section('head_title','注文状況')
@section('main_title','注文状況')
@section('main')
    @if(session('complete_msg'))
        <p class="alert alert-success" role="alert">{{session('complete_msg')}}</p>
    @endif
    @if(session('err_msg'))
        <p class="alert alert-danger" role="alert">{{session('err_msg')}}</p>
    @endif
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
                    <tr>                    
                    <td></td>
                    <td><img src=""></td>
                    <td><label for="">{{$order->menu->menu_name}}</label></td>
                    <td><input class="form-check-input" type="checkbox"{{$order->isChecked()}} disabled> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@extends('layouts.admin')

@section('content-header')
    <h1>第三方登录</h1>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"></h3>
            <div class="box-tools">
                <a href="{{ route('connect.admin.providers.destroy', $provider) }}" data-method="DELETE" data-confirm="真的要删除么？" class="btn btn-default">删除</a>
            </div>
        </div>
        <div class="box-body">
            {!! form($form) !!}
        </div>
        <div class="box-footer"></div>
    </div>
@endsection
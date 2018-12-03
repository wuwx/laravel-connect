@extends('layouts.admin')

@section('content-header')
    <h1>第三方登录</h1>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"></h3>
            <div class="box-tools">
                <a href="{{ route('connect.admin.providers.create') }}" class="btn btn-default">新增</a>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>名称</th>
                    <th>类名</th>
                    <th width="80"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($providers as $provider)
                    <tr>
                        <td>{{ $provider->name }}</td>
                        <td>{{ $provider->driver }}</td>
                        <td>
                            <a href="{{ route('connect.admin.providers.edit', $provider) }}" class="btn btn-default btn-sm">编辑</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="box-footer"></div>
    </div>
@endsection
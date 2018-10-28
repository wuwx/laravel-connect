@extends('connect::layouts.master')

@section('content')
    <h1>{!! config('connect.name') !!}</h1>

    <table class="table">
        @foreach($providers as $provider)
        <tr>
            <td>{{ $provider->name }}</td>
            <td><a href="connect" class="btn btn-primary">Connect</a></td>
        </tr>
        @endforeach
    </table>
@stop

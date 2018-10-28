@extends('connect::layouts.master')

@section('content')
    <h1>{!! config('connect.name') !!}</h1>
    <table class="table">
        @foreach($identities as $identity)
            <tr>
                <td>{{ $identity->identifier }}</td>
                <td>{{ $identity->provider }}</td>
                <td>{{ $identity->user->name }}</td>
            </tr>
        @endforeach
    </table>
@stop

@extends('connect::layouts.master')

@section('content')
    <h1>{!! config('connect.name') !!}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Identifier</th>
                <th>Provider</th>
                <th>Created At</th>
            </tr>
        </thead>
        @foreach($identities as $identity)
            <tr>
                <td>{{ $identity->identifier }}</td>
                <td>{{ $identity->provider }}</td>
                <td>{{ $identity->created_at }}</td>
            </tr>
        @endforeach
    </table>
@stop

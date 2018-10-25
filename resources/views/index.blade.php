@extends('connect::layouts.master')

@section('content')
    <h1>{!! config('connect.name') !!}</h1>
    @foreach($identities as $identity)
        {{ $identity->identifier }}
    @endforeach

@stop

@extends('connect::layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            Connect
        </div>
        <div class="card-body">
            <h5 class="card-title">Providers</h5>

            <table class="table">
                @foreach($providers as $provider)
                    <tr>
                        <td>{{ $provider->name }}</td>
                        <td><a href="{{ $provider->name }}" class="btn btn-primary">Connect</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop

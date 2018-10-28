@extends('connect::layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            Connect
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Provider</th>
                        <th>Identifier</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach($providers as $provider)
                    <tr>
                        <td>{{ $provider->name }}</td>

                        @if ($identity = \Wuwx\LaravelConnect\Identity::where(['user_id' => Auth::user()->id, 'provider' => $provider->name])->first())
                            <td>
                                {{ $identity->identifier }}
                            </td>
                            <td width="100">
                                <a href="{{ route("connect.identities.destroy", $identity) }}" data-method="DELETE" class="btn btn-danger">Disconnect</a>
                            </td>
                        @else
                            <td>
                            </td>
                            <td width="100">
                                <a href="{{ app('url')->to("/connect/{$provider->name}") }}" class="btn btn-primary">Connect</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop

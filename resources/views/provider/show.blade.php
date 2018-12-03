@extends('layouts.profile')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            {{ $provider->name }} - {{ $provider->title }}
        </div>
        <div class="box-body">
            {{ Form::open(["class" => 'form-horizontal'])}}
            @if ($identity = $provider->identities()->where('user_id', Request::user()->id)->first())
                <div class="form-group">
                    {{ Form::label('identifier', 'ID', ["class" => "col-sm-2 control-label"]) }}
                    <div class="col-sm-8">
                        <p class="form-control-static">{{ $identity->identifier }}</p>
                    </div>
                </div>
            @else
                <div class="alert alert-warning">
                    <p>尚未绑定过 {{ $provider->title }} 账户</p>
                </div>
            @endif
            {{ Form::close() }}
        </div>
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    @if ($identity)
                        <a href="{{ url("/connect/{$provider->name}") }}" data-method="DELETE" class="btn btn-danger">解除</a>
                    @else
                        <a href="{{ url("/connect/{$provider->name}") }}" class="btn btn-primary">关联</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

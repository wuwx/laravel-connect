@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div clss="col-md-3">

            </div>
            <div class="col-md-9">
                {{-- <link rel="stylesheet" href="{{ mix('css/connect.css') }}"> --}}
                @yield('content')
                {{-- <script src="{{ mix('js/connect.js') }}"></script> --}}
            </div>
        </div>
    </div>
@overwrite
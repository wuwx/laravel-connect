<?php

namespace Wuwx\LaravelConnect\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Wuwx\LaravelConnect\Provider;

class ProviderController extends Controller
{

    public function index()
    {
        return view('connect::provider.index');
    }

    public function show(Provider $provider)
    {
        return view('connect::provider.show', compact('provider'));
    }

}

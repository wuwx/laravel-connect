<?php

namespace Wuwx\LaravelConnect\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ProviderController extends Controller
{

    public function index()
    {
        return view('connect::provider.index');
    }
}

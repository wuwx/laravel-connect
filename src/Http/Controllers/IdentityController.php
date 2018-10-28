<?php

namespace Wuwx\LaravelConnect\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class IdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $identities = $request->user()->identities()->get();
        return view('connect::identity.index', compact('identities'));
    }
}

<?php

namespace Wuwx\LaravelConnect\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Laravel\Socialite\Facades\Socialite;
use Wuwx\LaravelConnect\Identity;
use Wuwx\LaravelConnect\Provider;

class ConnectController extends Controller
{
    public function index()
    {
        $providers = Provider::all();
        return view('connect::index', compact('providers'));
    }

    public function redirectToProvider(Request $request, $provider)
    {
        return Socialite::driver($provider)
            ->redirectUrl(http_build_url($request->fullUrl(), ["path" => "$provider/callback"], HTTP_URL_JOIN_PATH))
            ->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        $user = Socialite::driver($provider)->user();
        $request->user()->identities()->updateOrCreate(['identifier' => $user->id, 'provider' => $provider], ['data' => []]);
        return redirect()->route("connect.identities.index");
    }
}

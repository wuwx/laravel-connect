<?php

namespace Wuwx\LaravelConnect\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Laravel\Socialite\Facades\Socialite;
use Wuwx\LaravelConnect\Identity;

class ConnectController extends Controller
{
    public function index()
    {
        $identities = [];
        return view('connect::index', compact('identities'));
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
        $identity = Identity::updateOrCreate(['identifier' => $user->id, 'provider' => $provider], ['data' => []]);
        $this->guard()->login($identity);
        return $this->authenticated($request, $identity);
    }
}

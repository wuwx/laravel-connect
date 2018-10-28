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
        config(["services.$provider" => [
            'client_id' => '',
            'client_secret' => '',
            'redirect' => '',
        ]]);
        return Socialite::driver($provider)
            ->redirectUrl(app('url')->to("/connect/{$provider}/callback"))
            ->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        $user = Socialite::driver($provider)->user();

        Identity::where(['provider' => $provider, 'identifier' => $user->id])->delete();
        Identity::where(['user_id' => $request->user()->id, 'provider' => $provider])->delete();

        $identity = Identity::make(['provider' => $provider, 'identifier' => $user->id, 'data' => []]);
        $identity->user_id = $request->user()->id;
        $identity->save();

        return redirect("/connect");

    }
}

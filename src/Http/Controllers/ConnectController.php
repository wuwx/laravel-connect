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
        $providers = Provider::where(['enabled' => true])->get();
        return view('connect::index', compact('providers'));
    }

    public function redirectToProvider(Request $request, $name)
    {
        $provider = Provider::where(['enabled' => true, 'name' => $name])->first();
        if ($provider) {
            config(["services.$name" => $provider->options]);
            return Socialite::driver($name)
                ->redirectUrl(app('url')->to("/connect/{$name}/callback"))
                ->redirect();
        } else {
            return response("Not Found", 404);
        }

    }

    public function handleProviderCallback(Request $request, $name)
    {
        $provider = Provider::where(['enabled' => true, 'name' => $name])->first();
        if ($provider) {
            config(["services.$name" => $provider->options]);
            $user = Socialite::driver($name)->user();

            Identity::where(['provider' => $name, 'identifier' => $user->id])->delete();
            Identity::where(['user_id' => $request->user()->id, 'provider' => $name])->delete();

            $identity = Identity::make(['provider' => $name, 'identifier' => $user->id]);
            $identity->data = $user->getRaw();
            $identity->user_id = $request->user()->id;
            $identity->save();

            return redirect("/connect");
        } else {
            return response("Not Found", 404);
        }
    }
}

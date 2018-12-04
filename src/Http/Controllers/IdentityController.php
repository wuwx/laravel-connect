<?php

namespace Wuwx\LaravelConnect\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Wuwx\LaravelConnect\Identity;

class IdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $identities = Identity::where('user_id', $request->user()->id)->get();
        return view('connect::identity.index', compact('identities'));
    }

    public function destroy(Request $request, Identity $identity)
    {
        $identity->delete();
        session()->put('danger', '身份绑定已解除！');
        return redirect()->route("connect.providers.show", $identity->provider);
    }
}

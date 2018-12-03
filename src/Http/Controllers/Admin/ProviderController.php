<?php

namespace Wuwx\LaravelConnect\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Kris\LaravelFormBuilder\Facades\FormBuilder;
use Wuwx\LaravelConnect\Forms\ProviderForm;
use Wuwx\LaravelConnect\Provider;

class ProviderController extends Controller
{

    public function index()
    {
        $providers = Provider::all();
        return view('connect::admin.provider.index', compact('providers'));
    }

    public function edit(Provider $provider)
    {
        $form = FormBuilder::create(ProviderForm::class, [
            'method' => 'PUT',
            'model' => $provider,
            'url' => route('connect.admin.providers.update', compact('provider')),
        ]);

        return view('connect::admin.provider.edit', compact('provider', 'form'));
    }

    public function update(Request $request, Provider $provider)
    {
        $form = FormBuilder::create(ProviderForm::class);
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        } else {
            $provider->update($request->all());
            return redirect()->route('connect.admin.providers.index');
        }
    }

    public function create()
    {
        $form = FormBuilder::create(ProviderForm::class, [
            'method' => 'POST',
            'url' => route('connect.admin.providers.store'),
        ]);
        return view('admin.genres.create', compact('form'));
    }

    public function store(Request $request)
    {
        $form = FormBuilder::create(ProviderForm::class);
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        } else {
            Provider::create($request->all());
            return redirect()->route('connect.admin.providers.index');
        }
    }

    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('connect.admin.providers.index');
    }
}

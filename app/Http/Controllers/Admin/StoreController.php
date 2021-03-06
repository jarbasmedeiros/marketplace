<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Store;
use App\User;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('user.has.store')->only(['create', 'store']);
    }

    public function index()
    {
        $store = auth()->user()->store;

        return view('admin.stores.index', compact('store'));
    }

    public function create()
    {
        $users = User::all(['id', 'name']);

        return view('admin.stores.create', compact('users'));
    }

    public function store(StoreRequest $request)
    {
        $user = auth()->user();
        $user->store()->create($request->all());

        flash('Loja criada com sucesso!')->success();
        return redirect()->route('admin.stores.index');
    }

    public function edit($store)
    {
        $store = Store::find($store);

        return view('admin.stores.edit', compact('store'));
    }

    public function update(StoreRequest $request, $store)
    {
        $store = Store::find($store);
        $store->update($request->all());

        flash('Loja atualizada com sucesso!')->success();
        return redirect()->route('admin.stores.index');
    }

    public function destroy($store)
    {
        $store = Store::find($store);
        $store->delete();

        flash('Loja removida com sucesso!')->success();
        return redirect()->back();
    }
}

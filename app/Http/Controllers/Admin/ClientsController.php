<?php

namespace App\Http\Controllers\Admin;
use Codexshaper\WooCommerce\Facades\Customer;
use App\Asset;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAssetRequest;
use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientsController extends Controller
{ public function index()
    {
        abort_if(Gate::denies('asset_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Customer::all();

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        abort_if(Gate::denies('asset_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clients.create');
    }

    public function store(StoreAssetRequest $request)
    {
        $clients = Customer::create($request->all());

        return redirect()->route('admin.clients.index');

    }

    public function edit(Customer $clients)
    {
        abort_if(Gate::denies('asset_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clients.edit', compact('clients'));
    }

    public function update(UpdateAssetRequest $request, Customer $clients)
    {
        $clients->update($request->all());

        return redirect()->route('admin.cients.index');

    }

    public function show(Customer $clients)
    {
        abort_if(Gate::denies('asset_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clients.show', compact('clients'));
    }

    public function destroy(Customer $clients)
    {
        abort_if(Gate::denies('asset_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients->delete();

        return back();

    }

    public function massDestroy(MassDestroyAssetRequest $request)
    {
        Customer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}


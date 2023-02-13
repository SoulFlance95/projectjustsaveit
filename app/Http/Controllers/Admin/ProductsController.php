<?php

namespace App\Http\Controllers\Admin;
use Codexshaper\WooCommerce\Facades\Product;
use App\Asset;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAssetRequest;
use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{ public function index()
    {
        abort_if(Gate::denies('asset_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        abort_if(Gate::denies('asset_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.products.create');
    }

    public function store(StoreAssetRequest $request)
    {
        $products = Product::create($request->all());

        return redirect()->route('admin.products.index');

    }

    public function edit(Product $products)
    {
        abort_if(Gate::denies('asset_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.products.edit', compact('products'));
    }

    public function update(UpdateAssetRequest $request, Product $asset)
    {
        $asset->update($request->all());

        return redirect()->route('admin.products.index');

    }

    public function show(Product $products)
    {
        abort_if(Gate::denies('asset_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.products.show', compact('products'));
    }

    public function destroy(Product $products)
    {
        abort_if(Gate::denies('asset_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products->delete();

        return back();

    }

    public function massDestroy(MassDestroyAssetRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}


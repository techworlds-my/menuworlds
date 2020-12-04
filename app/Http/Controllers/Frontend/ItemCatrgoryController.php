<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyItemCatrgoryRequest;
use App\Http\Requests\StoreItemCatrgoryRequest;
use App\Http\Requests\UpdateItemCatrgoryRequest;
use App\Models\ItemCatrgory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemCatrgoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('item_catrgory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCatrgories = ItemCatrgory::all();

        return view('frontend.itemCatrgories.index', compact('itemCatrgories'));
    }

    public function create()
    {
        abort_if(Gate::denies('item_catrgory_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.itemCatrgories.create');
    }

    public function store(StoreItemCatrgoryRequest $request)
    {
        $itemCatrgory = ItemCatrgory::create($request->all());

        return redirect()->route('frontend.item-catrgories.index');
    }

    public function edit(ItemCatrgory $itemCatrgory)
    {
        abort_if(Gate::denies('item_catrgory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.itemCatrgories.edit', compact('itemCatrgory'));
    }

    public function update(UpdateItemCatrgoryRequest $request, ItemCatrgory $itemCatrgory)
    {
        $itemCatrgory->update($request->all());

        return redirect()->route('frontend.item-catrgories.index');
    }

    public function show(ItemCatrgory $itemCatrgory)
    {
        abort_if(Gate::denies('item_catrgory_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.itemCatrgories.show', compact('itemCatrgory'));
    }

    public function destroy(ItemCatrgory $itemCatrgory)
    {
        abort_if(Gate::denies('item_catrgory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCatrgory->delete();

        return back();
    }

    public function massDestroy(MassDestroyItemCatrgoryRequest $request)
    {
        ItemCatrgory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

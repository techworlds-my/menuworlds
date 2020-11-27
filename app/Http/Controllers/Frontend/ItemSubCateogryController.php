<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyItemSubCateogryRequest;
use App\Http\Requests\StoreItemSubCateogryRequest;
use App\Http\Requests\UpdateItemSubCateogryRequest;
use App\Models\ItemCatrgory;
use App\Models\ItemSubCateogry;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemSubCateogryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('item_sub_cateogry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemSubCateogries = ItemSubCateogry::with(['item_category'])->get();

        $item_catrgories = ItemCatrgory::get();

        return view('frontend.itemSubCateogries.index', compact('itemSubCateogries', 'item_catrgories'));
    }

    public function create()
    {
        abort_if(Gate::denies('item_sub_cateogry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item_categories = ItemCatrgory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.itemSubCateogries.create', compact('item_categories'));
    }

    public function store(StoreItemSubCateogryRequest $request)
    {
        $itemSubCateogry = ItemSubCateogry::create($request->all());

        return redirect()->route('frontend.item-sub-cateogries.index');
    }

    public function edit(ItemSubCateogry $itemSubCateogry)
    {
        abort_if(Gate::denies('item_sub_cateogry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item_categories = ItemCatrgory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $itemSubCateogry->load('item_category');

        return view('frontend.itemSubCateogries.edit', compact('item_categories', 'itemSubCateogry'));
    }

    public function update(UpdateItemSubCateogryRequest $request, ItemSubCateogry $itemSubCateogry)
    {
        $itemSubCateogry->update($request->all());

        return redirect()->route('frontend.item-sub-cateogries.index');
    }

    public function show(ItemSubCateogry $itemSubCateogry)
    {
        abort_if(Gate::denies('item_sub_cateogry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemSubCateogry->load('item_category');

        return view('frontend.itemSubCateogries.show', compact('itemSubCateogry'));
    }

    public function destroy(ItemSubCateogry $itemSubCateogry)
    {
        abort_if(Gate::denies('item_sub_cateogry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemSubCateogry->delete();

        return back();
    }

    public function massDestroy(MassDestroyItemSubCateogryRequest $request)
    {
        ItemSubCateogry::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

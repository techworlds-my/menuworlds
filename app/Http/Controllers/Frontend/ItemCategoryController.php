<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyItemCategoryRequest;
use App\Http\Requests\StoreItemCategoryRequest;
use App\Http\Requests\UpdateItemCategoryRequest;
use App\Models\ItemCategory;
use App\Models\MerchantManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('item_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCategories = ItemCategory::with(['merchant'])->get();

        return view('frontend.itemCategories.index', compact('itemCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('item_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchants = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.itemCategories.create', compact('merchants'));
    }

    public function store(StoreItemCategoryRequest $request)
    {
        $itemCategory = ItemCategory::create($request->all());

        return redirect()->route('frontend.item-categories.index');
    }

    public function edit(ItemCategory $itemCategory)
    {
        abort_if(Gate::denies('item_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchants = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $itemCategory->load('merchant');

        return view('frontend.itemCategories.edit', compact('merchants', 'itemCategory'));
    }

    public function update(UpdateItemCategoryRequest $request, ItemCategory $itemCategory)
    {
        $itemCategory->update($request->all());

        return redirect()->route('frontend.item-categories.index');
    }

    public function show(ItemCategory $itemCategory)
    {
        abort_if(Gate::denies('item_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCategory->load('merchant');

        return view('frontend.itemCategories.show', compact('itemCategory'));
    }

    public function destroy(ItemCategory $itemCategory)
    {
        abort_if(Gate::denies('item_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyItemCategoryRequest $request)
    {
        ItemCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
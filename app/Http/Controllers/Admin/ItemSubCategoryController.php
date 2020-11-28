<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyItemSubCategoryRequest;
use App\Http\Requests\StoreItemSubCategoryRequest;
use App\Http\Requests\UpdateItemSubCategoryRequest;
use App\Models\ItemCategory;
use App\Models\ItemSubCategory;
use App\Models\MerchantManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemSubCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('item_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemSubCategories = ItemSubCategory::with(['category', 'merchant'])->get();

        return view('admin.itemSubCategories.index', compact('itemSubCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('item_sub_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ItemCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchants = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.itemSubCategories.create', compact('categories', 'merchants'));
    }

    public function store(StoreItemSubCategoryRequest $request)
    {
        $itemSubCategory = ItemSubCategory::create($request->all());

        return redirect()->route('admin.item-sub-categories.index');
    }

    public function edit(ItemSubCategory $itemSubCategory)
    {
        abort_if(Gate::denies('item_sub_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ItemCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchants = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $itemSubCategory->load('category', 'merchant');

        return view('admin.itemSubCategories.edit', compact('categories', 'merchants', 'itemSubCategory'));
    }

    public function update(UpdateItemSubCategoryRequest $request, ItemSubCategory $itemSubCategory)
    {
        $itemSubCategory->update($request->all());

        return redirect()->route('admin.item-sub-categories.index');
    }

    public function show(ItemSubCategory $itemSubCategory)
    {
        abort_if(Gate::denies('item_sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemSubCategory->load('category', 'merchant');

        return view('admin.itemSubCategories.show', compact('itemSubCategory'));
    }

    public function destroy(ItemSubCategory $itemSubCategory)
    {
        abort_if(Gate::denies('item_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemSubCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyItemSubCategoryRequest $request)
    {
        ItemSubCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

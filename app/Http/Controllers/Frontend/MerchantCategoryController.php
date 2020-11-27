<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMerchantCategoryRequest;
use App\Http\Requests\StoreMerchantCategoryRequest;
use App\Http\Requests\UpdateMerchantCategoryRequest;
use App\Models\MerchantCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MerchantCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('merchant_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantCategories = MerchantCategory::all();

        return view('frontend.merchantCategories.index', compact('merchantCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('merchant_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.merchantCategories.create');
    }

    public function store(StoreMerchantCategoryRequest $request)
    {
        $merchantCategory = MerchantCategory::create($request->all());

        return redirect()->route('frontend.merchant-categories.index');
    }

    public function edit(MerchantCategory $merchantCategory)
    {
        abort_if(Gate::denies('merchant_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.merchantCategories.edit', compact('merchantCategory'));
    }

    public function update(UpdateMerchantCategoryRequest $request, MerchantCategory $merchantCategory)
    {
        $merchantCategory->update($request->all());

        return redirect()->route('frontend.merchant-categories.index');
    }

    public function show(MerchantCategory $merchantCategory)
    {
        abort_if(Gate::denies('merchant_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.merchantCategories.show', compact('merchantCategory'));
    }

    public function destroy(MerchantCategory $merchantCategory)
    {
        abort_if(Gate::denies('merchant_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyMerchantCategoryRequest $request)
    {
        MerchantCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

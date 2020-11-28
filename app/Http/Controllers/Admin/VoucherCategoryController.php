<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVoucherCategoryRequest;
use App\Http\Requests\StoreVoucherCategoryRequest;
use App\Http\Requests\UpdateVoucherCategoryRequest;
use App\Models\VoucherCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VoucherCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('voucher_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherCategories = VoucherCategory::all();

        return view('admin.voucherCategories.index', compact('voucherCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('voucher_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.voucherCategories.create');
    }

    public function store(StoreVoucherCategoryRequest $request)
    {
        $voucherCategory = VoucherCategory::create($request->all());

        return redirect()->route('admin.voucher-categories.index');
    }

    public function edit(VoucherCategory $voucherCategory)
    {
        abort_if(Gate::denies('voucher_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.voucherCategories.edit', compact('voucherCategory'));
    }

    public function update(UpdateVoucherCategoryRequest $request, VoucherCategory $voucherCategory)
    {
        $voucherCategory->update($request->all());

        return redirect()->route('admin.voucher-categories.index');
    }

    public function show(VoucherCategory $voucherCategory)
    {
        abort_if(Gate::denies('voucher_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.voucherCategories.show', compact('voucherCategory'));
    }

    public function destroy(VoucherCategory $voucherCategory)
    {
        abort_if(Gate::denies('voucher_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyVoucherCategoryRequest $request)
    {
        VoucherCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

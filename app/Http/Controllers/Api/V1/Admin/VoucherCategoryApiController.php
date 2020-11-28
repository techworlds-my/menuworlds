<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVoucherCategoryRequest;
use App\Http\Requests\UpdateVoucherCategoryRequest;
use App\Http\Resources\Admin\VoucherCategoryResource;
use App\Models\VoucherCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VoucherCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('voucher_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VoucherCategoryResource(VoucherCategory::all());
    }

    public function store(StoreVoucherCategoryRequest $request)
    {
        $voucherCategory = VoucherCategory::create($request->all());

        return (new VoucherCategoryResource($voucherCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(VoucherCategory $voucherCategory)
    {
        abort_if(Gate::denies('voucher_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VoucherCategoryResource($voucherCategory);
    }

    public function update(UpdateVoucherCategoryRequest $request, VoucherCategory $voucherCategory)
    {
        $voucherCategory->update($request->all());

        return (new VoucherCategoryResource($voucherCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(VoucherCategory $voucherCategory)
    {
        abort_if(Gate::denies('voucher_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

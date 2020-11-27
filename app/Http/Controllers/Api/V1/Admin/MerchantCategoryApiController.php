<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMerchantCategoryRequest;
use App\Http\Requests\UpdateMerchantCategoryRequest;
use App\Http\Resources\Admin\MerchantCategoryResource;
use App\Models\MerchantCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MerchantCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('merchant_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MerchantCategoryResource(MerchantCategory::all());
    }

    public function store(StoreMerchantCategoryRequest $request)
    {
        $merchantCategory = MerchantCategory::create($request->all());

        return (new MerchantCategoryResource($merchantCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MerchantCategory $merchantCategory)
    {
        abort_if(Gate::denies('merchant_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MerchantCategoryResource($merchantCategory);
    }

    public function update(UpdateMerchantCategoryRequest $request, MerchantCategory $merchantCategory)
    {
        $merchantCategory->update($request->all());

        return (new MerchantCategoryResource($merchantCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MerchantCategory $merchantCategory)
    {
        abort_if(Gate::denies('merchant_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

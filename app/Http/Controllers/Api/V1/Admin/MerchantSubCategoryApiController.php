<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreMerchantSubCategoryRequest;
use App\Http\Requests\UpdateMerchantSubCategoryRequest;
use App\Http\Resources\Admin\MerchantSubCategoryResource;
use App\Models\MerchantSubCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MerchantSubCategoryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('merchant_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MerchantSubCategoryResource(MerchantSubCategory::with(['category'])->get());
    }

    public function store(StoreMerchantSubCategoryRequest $request)
    {
        $merchantSubCategory = MerchantSubCategory::create($request->all());

        if ($request->input('image', false)) {
            $merchantSubCategory->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return (new MerchantSubCategoryResource($merchantSubCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MerchantSubCategory $merchantSubCategory)
    {
        abort_if(Gate::denies('merchant_sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MerchantSubCategoryResource($merchantSubCategory->load(['category']));
    }

    public function update(UpdateMerchantSubCategoryRequest $request, MerchantSubCategory $merchantSubCategory)
    {
        $merchantSubCategory->update($request->all());

        if ($request->input('image', false)) {
            if (!$merchantSubCategory->image || $request->input('image') !== $merchantSubCategory->image->file_name) {
                if ($merchantSubCategory->image) {
                    $merchantSubCategory->image->delete();
                }

                $merchantSubCategory->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($merchantSubCategory->image) {
            $merchantSubCategory->image->delete();
        }

        return (new MerchantSubCategoryResource($merchantSubCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MerchantSubCategory $merchantSubCategory)
    {
        abort_if(Gate::denies('merchant_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantSubCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

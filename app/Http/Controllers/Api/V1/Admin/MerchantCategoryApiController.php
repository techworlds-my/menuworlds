<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreMerchantCategoryRequest;
use App\Http\Requests\UpdateMerchantCategoryRequest;
use App\Http\Resources\Admin\MerchantCategoryResource;
use App\Models\MerchantCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MerchantCategoryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('merchant_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MerchantCategoryResource(MerchantCategory::all());
    }

    public function store(StoreMerchantCategoryRequest $request)
    {
        $merchantCategory = MerchantCategory::create($request->all());

        $file = $request->file('image');
        $imageCount = count($request->file('image'));
        

         for($i = 0;$i<$imageCount;$i++){
              $merchantCategory->addMedia($file[$i])->toMediaCollection('image');
         }

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

        if ($request->input('image', false)) {
            if (!$merchantCategory->image || $request->input('image') !== $merchantCategory->image->file_name) {
                if ($merchantCategory->image) {
                    $merchantCategory->image->delete();
                }

                $merchantCategory->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($merchantCategory->image) {
            $merchantCategory->image->delete();
        }

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

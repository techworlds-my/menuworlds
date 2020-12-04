<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreItemCategoryRequest;
use App\Http\Requests\UpdateItemCategoryRequest;
use App\Http\Resources\Admin\ItemCategoryResource;
use App\Models\ItemCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemCategoryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('item_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemCategoryResource(ItemCategory::with(['merchant'])->get());
    }

    public function store(StoreItemCategoryRequest $request)
    {
        $itemCategory = ItemCategory::create($request->all());
        $file = $request->file('image');
        $imageCount = count($request->file('image'));
        

         for($i = 0;$i<$imageCount;$i++){
              $itemCategory->addMedia($file[$i])->toMediaCollection('image');
         }

        return (new ItemCategoryResource($itemCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ItemCategory $itemCategory)
    {
        abort_if(Gate::denies('item_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemCategoryResource($itemCategory->load(['merchant']));
    }

    public function update(UpdateItemCategoryRequest $request, ItemCategory $itemCategory)
    {
        $itemCategory->update($request->all());

        if ($request->input('image', false)) {
            if (!$itemCategory->image || $request->input('image') !== $itemCategory->image->file_name) {
                if ($itemCategory->image) {
                    $itemCategory->image->delete();
                }

                $itemCategory->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($itemCategory->image) {
            $itemCategory->image->delete();
        }

        return (new ItemCategoryResource($itemCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ItemCategory $itemCategory)
    {
        abort_if(Gate::denies('item_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

        
    public function filter_by_merchant_id(int $id)
    {
        abort_if(Gate::denies('item_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemCategoryResource(ItemCategory::with(['merchant'])->get()>where('merchant_id',$id));
    }
}

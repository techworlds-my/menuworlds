<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreItemManagementRequest;
use App\Http\Requests\UpdateItemManagementRequest;
use App\Http\Resources\Admin\ItemManagementResource;
use App\Models\ItemManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemManagementApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('item_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemManagementResource(ItemManagement::with(['sub_category', 'category', 'merchant'])->get());
    }

    public function store(StoreItemManagementRequest $request)
    {
       
        $file = $request->file('image');

        $imageCount = count($request->file('image'));
        
        $itemManagement = ItemManagement::create($request->all());
         for($i = 0;$i<$imageCount;$i++){
              $itemManagement->addMedia($file[$i])->toMediaCollection('image');
         }
 
         return (new ItemManagementResource($itemManagement))
             ->response()
             ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ItemManagement $itemManagement)
    {
        abort_if(Gate::denies('item_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemManagementResource($itemManagement->load(['sub_category', 'category', 'merchant']));
    }

    public function update(UpdateItemManagementRequest $request, ItemManagement $itemManagement)
    {
        $itemManagement->update($request->all());

        if ($request->input('image', false)) {
            if (!$itemManagement->image || $request->input('image') !== $itemManagement->image->file_name) {
                if ($itemManagement->image) {
                    $itemManagement->image->delete();
                }

                $itemManagement->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($itemManagement->image) {
            $itemManagement->image->delete();
        }

        return (new ItemManagementResource($itemManagement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ItemManagement $itemManagement)
    {
        abort_if(Gate::denies('item_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemManagement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

            
    public function filter_by_merchant_id(int $id)
    {
        abort_if(Gate::denies('item_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemManagementResource(ItemManagement::with(['sub_category', 'category', 'merchant'])->get()->where('merchant_id',$id));
    }
    
   

    public function filter_by_merchant_id_category(int $id,int $category)
    {
        abort_if(Gate::denies('item_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        
        return new ItemManagementResource(ItemManagement::with(['sub_category', 'category', 'merchant'])->get()->where('merchant_id',$id)->where('category_id',$category));

    }

    public function filter_by_merchant_id_sub_category(int $id,int $category)
    {
        abort_if(Gate::denies('item_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return new ItemManagementResource(ItemManagement::with(['sub_category', 'category', 'merchant'])->get()->where('merchant_id',$id)->where('sub_category_id',$category));
    }
    
     public function filter_by_category(int $category)
    {
        abort_if(Gate::denies('item_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

         return new ItemManagementResource(ItemManagement::with(['sub_category', 'category', 'merchant'])->get()->where('category_id',$category));
    }
    
     public function filter_by_sub_category(int $category)
    {
        abort_if(Gate::denies('item_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

         return new ItemManagementResource(ItemManagement::with(['sub_category', 'category', 'merchant'])->get()->where('sub_category_id',$category));
    }

    public function filter_by_item_id(int $id)
    {
        abort_if(Gate::denies('item_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       return new ItemManagementResource(ItemManagement::with(['sub_category', 'category', 'merchant'])->get()->where('id',$id));
    }
    
}

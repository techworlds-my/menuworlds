<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreItemSubCategoryRequest;
use App\Http\Requests\UpdateItemSubCategoryRequest;
use App\Http\Resources\Admin\ItemSubCategoryResource;
use App\Models\ItemSubCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Admin\ItemManagementResource;
use App\Models\ItemManagement;

class ItemSubCategoryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('item_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemSubCategoryResource(ItemSubCategory::with(['category', 'merchant'])->get());
    }

    public function store(StoreItemSubCategoryRequest $request)
    {
        $itemSubCategory = ItemSubCategory::create($request->all());

        $file = $request->file('image');
        $imageCount = count($request->file('image'));
        

         for($i = 0;$i<$imageCount;$i++){
              $itemSubCategory->addMedia($file[$i])->toMediaCollection('image');
              
         }

        return (new ItemSubCategoryResource($itemSubCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ItemSubCategory $itemSubCategory)
    {
        abort_if(Gate::denies('item_sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemSubCategoryResource($itemSubCategory->load(['category', 'merchant']));
    }

    public function update(UpdateItemSubCategoryRequest $request, ItemSubCategory $itemSubCategory)
    {
        $itemSubCategory->update($request->all());

        if ($request->input('image', false)) {
            if (!$itemSubCategory->image || $request->input('image') !== $itemSubCategory->image->file_name) {
                if ($itemSubCategory->image) {
                    $itemSubCategory->image->delete();
                }

                $itemSubCategory->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($itemSubCategory->image) {
            $itemSubCategory->image->delete();
        }

        return (new ItemSubCategoryResource($itemSubCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ItemSubCategory $itemSubCategory)
    {
        abort_if(Gate::denies('item_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemSubCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function filter_by_category_or_sub(int $id)
    {   
        abort_if(Gate::denies('item_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $itemSubCategories = new ItemSubCategoryResource(ItemSubCategory::with(['category', 'merchant'])->where('parent',$id)->get());
        //detect if it is link to sub or category
        //yes
        if($itemSubCategories->isNotEmpty()){
            
            for($i=0;$i<$itemSubCategories->count();$i++){
                $subcategory_id = $itemSubCategories[$i]['id'];
           
                $item = new ItemManagementResource(ItemManagement::where('sub_category_id',$subcategory_id)->get());

                $sub = new ItemSubCategoryResource(ItemSubCategory::where('parent',$subcategory_id)->get());
                if($sub->isNotEmpty() || $item->isNotEmpty()){
                    $itemSubCategories[$i]['is_something'] = true;
                }
                
                else{
                    $itemSubCategories[$i]['is_something'] = false;
                }  
            }
  
            $itemSubCategories = $itemSubCategories->push(true);

        }
        //no
        else{
            $itemSubCategories = new ItemSubCategoryResource(ItemSubCategory::with(['category', 'merchant'])->get()->where('category_id',$id));
            for($i=0;$i<$itemSubCategories->count();$i++){
                $subcategory_id = $itemSubCategories[$i]['id'];

                $item = new ItemManagementResource(ItemManagement::where('sub_category_id',$subcategory_id)->get());

                $sub = new ItemSubCategoryResource(ItemSubCategory::where('parent',$subcategory_id)->get());

                if($sub->isNotEmpty() || $item->isNotEmpty()){
                    $itemSubCategories[$i]['is_something'] = true;
                }else{
                    $itemSubCategories[$i]['is_something'] = false;
                }  
            }
            $itemSubCategories = $itemSubCategories->push(false);
        }
     
            
        return $itemSubCategories;
      
    }
}

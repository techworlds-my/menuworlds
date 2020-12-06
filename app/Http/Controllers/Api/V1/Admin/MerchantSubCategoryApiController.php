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
use App\Http\Resources\Admin\MerchantManagementResource;
use App\Models\MerchantManagement;

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

    
        $file = $request->file('image');
        $imageCount = count($request->file('image'));
        

         for($i = 0;$i<$imageCount;$i++){
              $merchantSubCategory->addMedia($file[$i])->toMediaCollection('image');
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

    public function filter_by_category($id)
    {
        abort_if(Gate::denies('merchant_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $subCategory =  new MerchantSubCategoryResource(MerchantSubCategory::with(['category'])->get()->where('category_id',$id));
   
        for($i=0;$i<$subCategory->count();$i++){
            $sub_category_id = $subCategory[$i]['id'];
 

            $merchant = new MerchantManagementResource(MerchantManagement::where('sub_category_id',$sub_category_id)->get());
            if($merchant->isNotEmpty()){
                $subCategory[$i]['is_something'] = true;
            }else{
                $subCategory[$i]['is_something'] = false;
            }  
        }
        return $subCategory;
    }
    
}

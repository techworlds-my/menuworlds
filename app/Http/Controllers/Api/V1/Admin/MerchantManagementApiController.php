<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreMerchantManagementRequest;
use App\Http\Requests\UpdateMerchantManagementRequest;
use App\Http\Resources\Admin\MerchantManagementResource;
use App\Models\MerchantManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MerchantManagementApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('merchant_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MerchantManagementResource(MerchantManagement::with(['sub_category', 'merchane_level', 'area'])->get());
    }

    public function store(StoreMerchantManagementRequest $request)
    {
        $merchantManagement = MerchantManagement::create($request->all());
        
        $file = $request->file('profile_photo');
        $banner = $request->file('banner');
        $bannerCount = count($request->file('banner'));
        $imageCount = count($request->file('profile_photo'));
        

         for($i = 0;$i<$imageCount;$i++){
              $merchantManagement->addMedia($file[$i])->toMediaCollection('profile_photo');
         }
 
         for($j = 0;$j<$bannerCount;$j++){
            $merchantManagement->addMedia($banner[$j])->toMediaCollection('banner');
       }



        return (new MerchantManagementResource($merchantManagement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MerchantManagement $merchantManagement)
    {
        abort_if(Gate::denies('merchant_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MerchantManagementResource($merchantManagement->load(['sub_category', 'merchane_level', 'area']));
    }

    public function update(UpdateMerchantManagementRequest $request, MerchantManagement $merchantManagement)
    {
        $merchantManagement->update($request->all());

        if ($request->input('profile_photo', false)) {
            if (!$merchantManagement->profile_photo || $request->input('profile_photo') !== $merchantManagement->profile_photo->file_name) {
                if ($merchantManagement->profile_photo) {
                    $merchantManagement->profile_photo->delete();
                }

                $merchantManagement->addMedia(storage_path('tmp/uploads/' . $request->input('profile_photo')))->toMediaCollection('profile_photo');
            }
        } elseif ($merchantManagement->profile_photo) {
            $merchantManagement->profile_photo->delete();
        }

        if ($request->input('banner', false)) {
            if (!$merchantManagement->banner || $request->input('banner') !== $merchantManagement->banner->file_name) {
                if ($merchantManagement->banner) {
                    $merchantManagement->banner->delete();
                }

                $merchantManagement->addMedia(storage_path('tmp/uploads/' . $request->input('banner')))->toMediaCollection('banner');
            }
        } elseif ($merchantManagement->banner) {
            $merchantManagement->banner->delete();
        }

        return (new MerchantManagementResource($merchantManagement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MerchantManagement $merchantManagement)
    {
        abort_if(Gate::denies('merchant_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantManagement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function filter_by_id(int $id)
    {
        abort_if(Gate::denies('merchant_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MerchantManagementResource(MerchantManagement::with(['sub_category', 'merchane_level', 'area'])->get()->where('id',$id));
    }
    
    public function filter_by_sub_category(int $subcategory)
    {
        abort_if(Gate::denies('merchant_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MerchantManagementResource(MerchantManagement::with(['sub_category', 'merchane_level', 'area'])->get()->where('sub_category_id',$subcategory));
    }
}

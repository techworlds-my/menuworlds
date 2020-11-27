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

        if ($request->input('profile_photo', false)) {
            $merchantManagement->addMedia(storage_path('tmp/uploads/' . $request->input('profile_photo')))->toMediaCollection('profile_photo');
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
}

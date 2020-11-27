<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMerchantManagementRequest;
use App\Http\Requests\StoreMerchantManagementRequest;
use App\Http\Requests\UpdateMerchantManagementRequest;
use App\Models\Area;
use App\Models\MerchantLevel;
use App\Models\MerchantManagement;
use App\Models\MerchantSubCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MerchantManagementController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('merchant_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantManagements = MerchantManagement::with(['sub_category', 'merchane_level', 'area', 'media'])->get();

        $merchant_sub_categories = MerchantSubCategory::get();

        $merchant_levels = MerchantLevel::get();

        $areas = Area::get();

        return view('frontend.merchantManagements.index', compact('merchantManagements', 'merchant_sub_categories', 'merchant_levels', 'areas'));
    }

    public function create()
    {
        abort_if(Gate::denies('merchant_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_categories = MerchantSubCategory::all()->pluck('sub_category', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchane_levels = MerchantLevel::all()->pluck('level', 'id')->prepend(trans('global.pleaseSelect'), '');

        $areas = Area::all()->pluck('area', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.merchantManagements.create', compact('sub_categories', 'merchane_levels', 'areas'));
    }

    public function store(StoreMerchantManagementRequest $request)
    {
        $merchantManagement = MerchantManagement::create($request->all());

        if ($request->input('profile_photo', false)) {
            $merchantManagement->addMedia(storage_path('tmp/uploads/' . $request->input('profile_photo')))->toMediaCollection('profile_photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $merchantManagement->id]);
        }

        return redirect()->route('frontend.merchant-managements.index');
    }

    public function edit(MerchantManagement $merchantManagement)
    {
        abort_if(Gate::denies('merchant_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_categories = MerchantSubCategory::all()->pluck('sub_category', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchane_levels = MerchantLevel::all()->pluck('level', 'id')->prepend(trans('global.pleaseSelect'), '');

        $areas = Area::all()->pluck('area', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchantManagement->load('sub_category', 'merchane_level', 'area');

        return view('frontend.merchantManagements.edit', compact('sub_categories', 'merchane_levels', 'areas', 'merchantManagement'));
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

        return redirect()->route('frontend.merchant-managements.index');
    }

    public function show(MerchantManagement $merchantManagement)
    {
        abort_if(Gate::denies('merchant_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantManagement->load('sub_category', 'merchane_level', 'area');

        return view('frontend.merchantManagements.show', compact('merchantManagement'));
    }

    public function destroy(MerchantManagement $merchantManagement)
    {
        abort_if(Gate::denies('merchant_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantManagement->delete();

        return back();
    }

    public function massDestroy(MassDestroyMerchantManagementRequest $request)
    {
        MerchantManagement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('merchant_management_create') && Gate::denies('merchant_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MerchantManagement();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

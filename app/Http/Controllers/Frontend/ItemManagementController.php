<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyItemManagementRequest;
use App\Http\Requests\StoreItemManagementRequest;
use App\Http\Requests\UpdateItemManagementRequest;
use App\Models\ItemCategory;
use App\Models\ItemManagement;
use App\Models\ItemSubCategory;
use App\Models\MerchantManagement;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ItemManagementController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('item_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemManagements = ItemManagement::with(['sub_category', 'category', 'merchant', 'media'])->get();

        $item_sub_categories = ItemSubCategory::get();

        $item_categories = ItemCategory::get();

        $merchant_managements = MerchantManagement::get();

        return view('frontend.itemManagements.index', compact('itemManagements', 'item_sub_categories', 'item_categories', 'merchant_managements'));
    }

    public function create()
    {
        abort_if(Gate::denies('item_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_categories = ItemSubCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = ItemCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchants = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.itemManagements.create', compact('sub_categories', 'categories', 'merchants'));
    }

    public function store(StoreItemManagementRequest $request)
    {
        $itemManagement = ItemManagement::create($request->all());

        foreach ($request->input('image', []) as $file) {
            $itemManagement->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $itemManagement->id]);
        }

        return redirect()->route('frontend.item-managements.index');
    }

    public function edit(ItemManagement $itemManagement)
    {
        abort_if(Gate::denies('item_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_categories = ItemSubCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = ItemCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchants = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $itemManagement->load('sub_category', 'category', 'merchant');

        return view('frontend.itemManagements.edit', compact('sub_categories', 'categories', 'merchants', 'itemManagement'));
    }

    public function update(UpdateItemManagementRequest $request, ItemManagement $itemManagement)
    {
        $itemManagement->update($request->all());

        if (count($itemManagement->image) > 0) {
            foreach ($itemManagement->image as $media) {
                if (!in_array($media->file_name, $request->input('image', []))) {
                    $media->delete();
                }
            }
        }

        $media = $itemManagement->image->pluck('file_name')->toArray();

        foreach ($request->input('image', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $itemManagement->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('image');
            }
        }

        return redirect()->route('frontend.item-managements.index');
    }

    public function show(ItemManagement $itemManagement)
    {
        abort_if(Gate::denies('item_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemManagement->load('sub_category', 'category', 'merchant');

        return view('frontend.itemManagements.show', compact('itemManagement'));
    }

    public function destroy(ItemManagement $itemManagement)
    {
        abort_if(Gate::denies('item_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemManagement->delete();

        return back();
    }

    public function massDestroy(MassDestroyItemManagementRequest $request)
    {
        ItemManagement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('item_management_create') && Gate::denies('item_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ItemManagement();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

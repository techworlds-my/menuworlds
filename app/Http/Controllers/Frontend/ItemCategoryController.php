<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyItemCategoryRequest;
use App\Http\Requests\StoreItemCategoryRequest;
use App\Http\Requests\UpdateItemCategoryRequest;
use App\Models\ItemCategory;
use App\Models\MerchantManagement;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ItemCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('item_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCategories = ItemCategory::with(['merchant', 'media'])->get();

        return view('frontend.itemCategories.index', compact('itemCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('item_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchants = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.itemCategories.create', compact('merchants'));
    }

    public function store(StoreItemCategoryRequest $request)
    {
        $itemCategory = ItemCategory::create($request->all());

        if ($request->input('image', false)) {
            $itemCategory->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $itemCategory->id]);
        }

        return redirect()->route('frontend.item-categories.index');
    }

    public function edit(ItemCategory $itemCategory)
    {
        abort_if(Gate::denies('item_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchants = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $itemCategory->load('merchant');

        return view('frontend.itemCategories.edit', compact('merchants', 'itemCategory'));
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

        return redirect()->route('frontend.item-categories.index');
    }

    public function show(ItemCategory $itemCategory)
    {
        abort_if(Gate::denies('item_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCategory->load('merchant');

        return view('frontend.itemCategories.show', compact('itemCategory'));
    }

    public function destroy(ItemCategory $itemCategory)
    {
        abort_if(Gate::denies('item_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyItemCategoryRequest $request)
    {
        ItemCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('item_category_create') && Gate::denies('item_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ItemCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

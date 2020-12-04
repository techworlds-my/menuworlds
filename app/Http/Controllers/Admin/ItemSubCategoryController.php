<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyItemSubCategoryRequest;
use App\Http\Requests\StoreItemSubCategoryRequest;
use App\Http\Requests\UpdateItemSubCategoryRequest;
use App\Models\ItemCategory;
use App\Models\ItemSubCategory;
use App\Models\MerchantManagement;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ItemSubCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('item_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemSubCategories = ItemSubCategory::with(['category', 'merchant', 'media'])->get();

        return view('admin.itemSubCategories.index', compact('itemSubCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('item_sub_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ItemCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchants = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.itemSubCategories.create', compact('categories', 'merchants'));
    }

    public function store(StoreItemSubCategoryRequest $request)
    {
        $itemSubCategory = ItemSubCategory::create($request->all());

        if ($request->input('image', false)) {
            $itemSubCategory->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $itemSubCategory->id]);
        }

        return redirect()->route('admin.item-sub-categories.index');
    }

    public function edit(ItemSubCategory $itemSubCategory)
    {
        abort_if(Gate::denies('item_sub_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ItemCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchants = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $itemSubCategory->load('category', 'merchant');

        return view('admin.itemSubCategories.edit', compact('categories', 'merchants', 'itemSubCategory'));
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

        return redirect()->route('admin.item-sub-categories.index');
    }

    public function show(ItemSubCategory $itemSubCategory)
    {
        abort_if(Gate::denies('item_sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemSubCategory->load('category', 'merchant');

        return view('admin.itemSubCategories.show', compact('itemSubCategory'));
    }

    public function destroy(ItemSubCategory $itemSubCategory)
    {
        abort_if(Gate::denies('item_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemSubCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyItemSubCategoryRequest $request)
    {
        ItemSubCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('item_sub_category_create') && Gate::denies('item_sub_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ItemSubCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

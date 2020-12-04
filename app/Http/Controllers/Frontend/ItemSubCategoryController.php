<?php

namespace App\Http\Controllers\Frontend;

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

<<<<<<< HEAD
        $itemSubCategories = ItemSubCategory::with(['category', 'merchant', 'media'])->get();
=======
        $itemSubCategories = ItemSubCategory::with(['category', 'merchant', 'parent', 'media'])->get();
>>>>>>> 2c4a47a5c3e5d5ea4cf11bf66ce3c586c4dbcc8f

        return view('frontend.itemSubCategories.index', compact('itemSubCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('item_sub_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ItemCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchants = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

<<<<<<< HEAD
        return view('frontend.itemSubCategories.create', compact('categories', 'merchants'));
=======
        $parents = ItemSubCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.itemSubCategories.create', compact('categories', 'merchants', 'parents'));
>>>>>>> 2c4a47a5c3e5d5ea4cf11bf66ce3c586c4dbcc8f
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

        return redirect()->route('frontend.item-sub-categories.index');
    }

    public function edit(ItemSubCategory $itemSubCategory)
    {
        abort_if(Gate::denies('item_sub_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ItemCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchants = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

<<<<<<< HEAD
        $itemSubCategory->load('category', 'merchant');

        return view('frontend.itemSubCategories.edit', compact('categories', 'merchants', 'itemSubCategory'));
=======
        $parents = ItemSubCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $itemSubCategory->load('category', 'merchant', 'parent');

        return view('frontend.itemSubCategories.edit', compact('categories', 'merchants', 'parents', 'itemSubCategory'));
>>>>>>> 2c4a47a5c3e5d5ea4cf11bf66ce3c586c4dbcc8f
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

        return redirect()->route('frontend.item-sub-categories.index');
    }

    public function show(ItemSubCategory $itemSubCategory)
    {
        abort_if(Gate::denies('item_sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

<<<<<<< HEAD
        $itemSubCategory->load('category', 'merchant');
=======
        $itemSubCategory->load('category', 'merchant', 'parent');
>>>>>>> 2c4a47a5c3e5d5ea4cf11bf66ce3c586c4dbcc8f

        return view('frontend.itemSubCategories.show', compact('itemSubCategory'));
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

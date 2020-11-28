<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemCategoryRequest;
use App\Http\Requests\UpdateItemCategoryRequest;
use App\Http\Resources\Admin\ItemCategoryResource;
use App\Models\ItemCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('item_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemCategoryResource(ItemCategory::all());
    }

    public function store(StoreItemCategoryRequest $request)
    {
        $itemCategory = ItemCategory::create($request->all());

        return (new ItemCategoryResource($itemCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ItemCategory $itemCategory)
    {
        abort_if(Gate::denies('item_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemCategoryResource($itemCategory);
    }

    public function update(UpdateItemCategoryRequest $request, ItemCategory $itemCategory)
    {
        $itemCategory->update($request->all());

        return (new ItemCategoryResource($itemCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ItemCategory $itemCategory)
    {
        abort_if(Gate::denies('item_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

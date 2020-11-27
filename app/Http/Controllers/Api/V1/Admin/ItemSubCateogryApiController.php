<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemSubCateogryRequest;
use App\Http\Requests\UpdateItemSubCateogryRequest;
use App\Http\Resources\Admin\ItemSubCateogryResource;
use App\Models\ItemSubCateogry;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemSubCateogryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('item_sub_cateogry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemSubCateogryResource(ItemSubCateogry::with(['item_category'])->get());
    }

    public function store(StoreItemSubCateogryRequest $request)
    {
        $itemSubCateogry = ItemSubCateogry::create($request->all());

        return (new ItemSubCateogryResource($itemSubCateogry))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ItemSubCateogry $itemSubCateogry)
    {
        abort_if(Gate::denies('item_sub_cateogry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemSubCateogryResource($itemSubCateogry->load(['item_category']));
    }

    public function update(UpdateItemSubCateogryRequest $request, ItemSubCateogry $itemSubCateogry)
    {
        $itemSubCateogry->update($request->all());

        return (new ItemSubCateogryResource($itemSubCateogry))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ItemSubCateogry $itemSubCateogry)
    {
        abort_if(Gate::denies('item_sub_cateogry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemSubCateogry->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

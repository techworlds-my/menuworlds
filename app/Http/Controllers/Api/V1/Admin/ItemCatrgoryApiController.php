<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemCatrgoryRequest;
use App\Http\Requests\UpdateItemCatrgoryRequest;
use App\Http\Resources\Admin\ItemCatrgoryResource;
use App\Models\ItemCatrgory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemCatrgoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('item_catrgory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemCatrgoryResource(ItemCatrgory::all());
    }

    public function store(StoreItemCatrgoryRequest $request)
    {
        $itemCatrgory = ItemCatrgory::create($request->all());

        return (new ItemCatrgoryResource($itemCatrgory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ItemCatrgory $itemCatrgory)
    {
        abort_if(Gate::denies('item_catrgory_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemCatrgoryResource($itemCatrgory);
    }

    public function update(UpdateItemCatrgoryRequest $request, ItemCatrgory $itemCatrgory)
    {
        $itemCatrgory->update($request->all());

        return (new ItemCatrgoryResource($itemCatrgory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ItemCatrgory $itemCatrgory)
    {
        abort_if(Gate::denies('item_catrgory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCatrgory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddOnCategoryRequest;
use App\Http\Requests\UpdateAddOnCategoryRequest;
use App\Http\Resources\Admin\AddOnCategoryResource;
use App\Models\AddOnCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddOnCategoriesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('add_on_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddOnCategoryResource(AddOnCategory::with(['created_by'])->get());
    }

    public function store(StoreAddOnCategoryRequest $request)
    {
        $addOnCategory = AddOnCategory::create($request->all());

        return (new AddOnCategoryResource($addOnCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddOnCategory $addOnCategory)
    {
        abort_if(Gate::denies('add_on_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddOnCategoryResource($addOnCategory->load(['created_by']));
    }

    public function update(UpdateAddOnCategoryRequest $request, AddOnCategory $addOnCategory)
    {
        $addOnCategory->update($request->all());

        return (new AddOnCategoryResource($addOnCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddOnCategory $addOnCategory)
    {
        abort_if(Gate::denies('add_on_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addOnCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

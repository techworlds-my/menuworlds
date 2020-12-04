<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddOnManagementRequest;
use App\Http\Requests\UpdateAddOnManagementRequest;
use App\Http\Resources\Admin\AddOnManagementResource;
use App\Models\AddOnManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddOnManagementsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('add_on_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddOnManagementResource(AddOnManagement::with(['category'])->get());
    }

    public function store(StoreAddOnManagementRequest $request)
    {
        $addOnManagement = AddOnManagement::create($request->all());

        return (new AddOnManagementResource($addOnManagement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddOnManagement $addOnManagement)
    {
        abort_if(Gate::denies('add_on_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddOnManagementResource($addOnManagement->load(['category']));
    }

    public function update(UpdateAddOnManagementRequest $request, AddOnManagement $addOnManagement)
    {
        $addOnManagement->update($request->all());

        return (new AddOnManagementResource($addOnManagement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddOnManagement $addOnManagement)
    {
        abort_if(Gate::denies('add_on_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addOnManagement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

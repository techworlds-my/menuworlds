<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSeatsManagementRequest;
use App\Http\Requests\UpdateSeatsManagementRequest;
use App\Http\Resources\Admin\SeatsManagementResource;
use App\Models\SeatsManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SeatsManagementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('seats_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SeatsManagementResource(SeatsManagement::with(['order'])->get());
    }

    public function store(StoreSeatsManagementRequest $request)
    {
        $seatsManagement = SeatsManagement::create($request->all());

        return (new SeatsManagementResource($seatsManagement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SeatsManagement $seatsManagement)
    {
        abort_if(Gate::denies('seats_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SeatsManagementResource($seatsManagement->load(['order']));
    }

    public function update(UpdateSeatsManagementRequest $request, SeatsManagement $seatsManagement)
    {
        $seatsManagement->update($request->all());

        return (new SeatsManagementResource($seatsManagement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SeatsManagement $seatsManagement)
    {
        abort_if(Gate::denies('seats_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seatsManagement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

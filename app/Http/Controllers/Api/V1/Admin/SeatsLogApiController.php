<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSeatsLogRequest;
use App\Http\Requests\UpdateSeatsLogRequest;
use App\Http\Resources\Admin\SeatsLogResource;
use App\Models\SeatsLog;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SeatsLogApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('seats_log_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SeatsLogResource(SeatsLog::with(['order'])->get());
    }

    public function store(StoreSeatsLogRequest $request)
    {
        $seatsLog = SeatsLog::create($request->all());

        return (new SeatsLogResource($seatsLog))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SeatsLog $seatsLog)
    {
        abort_if(Gate::denies('seats_log_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SeatsLogResource($seatsLog->load(['order']));
    }

    public function update(UpdateSeatsLogRequest $request, SeatsLog $seatsLog)
    {
        $seatsLog->update($request->all());

        return (new SeatsLogResource($seatsLog))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SeatsLog $seatsLog)
    {
        abort_if(Gate::denies('seats_log_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seatsLog->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

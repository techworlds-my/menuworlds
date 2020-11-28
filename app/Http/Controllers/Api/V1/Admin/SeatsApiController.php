<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSeatRequest;
use App\Http\Requests\UpdateSeatRequest;
use App\Http\Resources\Admin\SeatResource;
use App\Models\Seat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SeatsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('seat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SeatResource(Seat::with(['order'])->get());
    }

    public function store(StoreSeatRequest $request)
    {
        $seat = Seat::create($request->all());

        return (new SeatResource($seat))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Seat $seat)
    {
        abort_if(Gate::denies('seat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SeatResource($seat->load(['order']));
    }

    public function update(UpdateSeatRequest $request, Seat $seat)
    {
        $seat->update($request->all());

        return (new SeatResource($seat))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Seat $seat)
    {
        abort_if(Gate::denies('seat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seat->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

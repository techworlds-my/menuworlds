<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAsdasdRequest;
use App\Http\Requests\UpdateAsdasdRequest;
use App\Http\Resources\Admin\AsdasdResource;
use App\Models\Asdasd;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AsdasdApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asdasd_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AsdasdResource(Asdasd::all());
    }

    public function store(StoreAsdasdRequest $request)
    {
        $asdasd = Asdasd::create($request->all());

        return (new AsdasdResource($asdasd))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Asdasd $asdasd)
    {
        abort_if(Gate::denies('asdasd_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AsdasdResource($asdasd);
    }

    public function update(UpdateAsdasdRequest $request, Asdasd $asdasd)
    {
        $asdasd->update($request->all());

        return (new AsdasdResource($asdasd))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Asdasd $asdasd)
    {
        abort_if(Gate::denies('asdasd_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asdasd->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

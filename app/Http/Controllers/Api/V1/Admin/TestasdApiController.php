<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestasdRequest;
use App\Http\Requests\UpdateTestasdRequest;
use App\Http\Resources\Admin\TestasdResource;
use App\Models\Testasd;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestasdApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('testasd_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TestasdResource(Testasd::all());
    }

    public function store(StoreTestasdRequest $request)
    {
        $testasd = Testasd::create($request->all());

        return (new TestasdResource($testasd))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Testasd $testasd)
    {
        abort_if(Gate::denies('testasd_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TestasdResource($testasd);
    }

    public function update(UpdateTestasdRequest $request, Testasd $testasd)
    {
        $testasd->update($request->all());

        return (new TestasdResource($testasd))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Testasd $testasd)
    {
        abort_if(Gate::denies('testasd_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testasd->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

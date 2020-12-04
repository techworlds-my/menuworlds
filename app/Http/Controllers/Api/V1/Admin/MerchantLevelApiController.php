<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMerchantLevelRequest;
use App\Http\Requests\UpdateMerchantLevelRequest;
use App\Http\Resources\Admin\MerchantLevelResource;
use App\Models\MerchantLevel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MerchantLevelApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('merchant_level_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MerchantLevelResource(MerchantLevel::all());
    }

    public function store(StoreMerchantLevelRequest $request)
    {
        $merchantLevel = MerchantLevel::create($request->all());

        return (new MerchantLevelResource($merchantLevel))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MerchantLevel $merchantLevel)
    {
        abort_if(Gate::denies('merchant_level_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MerchantLevelResource($merchantLevel);
    }

    public function update(UpdateMerchantLevelRequest $request, MerchantLevel $merchantLevel)
    {
        $merchantLevel->update($request->all());

        return (new MerchantLevelResource($merchantLevel))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MerchantLevel $merchantLevel)
    {
        abort_if(Gate::denies('merchant_level_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantLevel->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMerchantLevelRequest;
use App\Http\Requests\StoreMerchantLevelRequest;
use App\Http\Requests\UpdateMerchantLevelRequest;
use App\Models\MerchantLevel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MerchantLevelController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('merchant_level_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantLevels = MerchantLevel::all();

        return view('frontend.merchantLevels.index', compact('merchantLevels'));
    }

    public function create()
    {
        abort_if(Gate::denies('merchant_level_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.merchantLevels.create');
    }

    public function store(StoreMerchantLevelRequest $request)
    {
        $merchantLevel = MerchantLevel::create($request->all());

        return redirect()->route('frontend.merchant-levels.index');
    }

    public function edit(MerchantLevel $merchantLevel)
    {
        abort_if(Gate::denies('merchant_level_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.merchantLevels.edit', compact('merchantLevel'));
    }

    public function update(UpdateMerchantLevelRequest $request, MerchantLevel $merchantLevel)
    {
        $merchantLevel->update($request->all());

        return redirect()->route('frontend.merchant-levels.index');
    }

    public function show(MerchantLevel $merchantLevel)
    {
        abort_if(Gate::denies('merchant_level_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.merchantLevels.show', compact('merchantLevel'));
    }

    public function destroy(MerchantLevel $merchantLevel)
    {
        abort_if(Gate::denies('merchant_level_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantLevel->delete();

        return back();
    }

    public function massDestroy(MassDestroyMerchantLevelRequest $request)
    {
        MerchantLevel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

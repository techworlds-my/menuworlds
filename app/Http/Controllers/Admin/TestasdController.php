<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTestasdRequest;
use App\Http\Requests\StoreTestasdRequest;
use App\Http\Requests\UpdateTestasdRequest;
use App\Models\Testasd;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestasdController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('testasd_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testasds = Testasd::all();

        return view('admin.testasds.index', compact('testasds'));
    }

    public function create()
    {
        abort_if(Gate::denies('testasd_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.testasds.create');
    }

    public function store(StoreTestasdRequest $request)
    {
        $testasd = Testasd::create($request->all());

        return redirect()->route('admin.testasds.index');
    }

    public function edit(Testasd $testasd)
    {
        abort_if(Gate::denies('testasd_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.testasds.edit', compact('testasd'));
    }

    public function update(UpdateTestasdRequest $request, Testasd $testasd)
    {
        $testasd->update($request->all());

        return redirect()->route('admin.testasds.index');
    }

    public function show(Testasd $testasd)
    {
        abort_if(Gate::denies('testasd_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.testasds.show', compact('testasd'));
    }

    public function destroy(Testasd $testasd)
    {
        abort_if(Gate::denies('testasd_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testasd->delete();

        return back();
    }

    public function massDestroy(MassDestroyTestasdRequest $request)
    {
        Testasd::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

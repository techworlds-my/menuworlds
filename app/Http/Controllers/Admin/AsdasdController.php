<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAsdasdRequest;
use App\Http\Requests\StoreAsdasdRequest;
use App\Http\Requests\UpdateAsdasdRequest;
use App\Models\Asdasd;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AsdasdController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asdasd_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asdasds = Asdasd::all();

        return view('admin.asdasds.index', compact('asdasds'));
    }

    public function create()
    {
        abort_if(Gate::denies('asdasd_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.asdasds.create');
    }

    public function store(StoreAsdasdRequest $request)
    {
        $asdasd = Asdasd::create($request->all());

        return redirect()->route('admin.asdasds.index');
    }

    public function edit(Asdasd $asdasd)
    {
        abort_if(Gate::denies('asdasd_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.asdasds.edit', compact('asdasd'));
    }

    public function update(UpdateAsdasdRequest $request, Asdasd $asdasd)
    {
        $asdasd->update($request->all());

        return redirect()->route('admin.asdasds.index');
    }

    public function show(Asdasd $asdasd)
    {
        abort_if(Gate::denies('asdasd_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.asdasds.show', compact('asdasd'));
    }

    public function destroy(Asdasd $asdasd)
    {
        abort_if(Gate::denies('asdasd_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asdasd->delete();

        return back();
    }

    public function massDestroy(MassDestroyAsdasdRequest $request)
    {
        Asdasd::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

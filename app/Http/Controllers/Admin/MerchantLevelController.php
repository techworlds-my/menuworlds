<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMerchantLevelRequest;
use App\Http\Requests\StoreMerchantLevelRequest;
use App\Http\Requests\UpdateMerchantLevelRequest;
use App\Models\MerchantLevel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MerchantLevelController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('merchant_level_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MerchantLevel::query()->select(sprintf('%s.*', (new MerchantLevel)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'merchant_level_show';
                $editGate      = 'merchant_level_edit';
                $deleteGate    = 'merchant_level_delete';
                $crudRoutePart = 'merchant-levels';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('level', function ($row) {
                return $row->level ? $row->level : "";
            });
            $table->editColumn('in_enable', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->in_enable ? 'checked' : null) . '>';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : "";
            });
            $table->editColumn('module', function ($row) {
                return $row->module ? $row->module : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'in_enable']);

            return $table->make(true);
        }

        return view('admin.merchantLevels.index');
    }

    public function create()
    {
        abort_if(Gate::denies('merchant_level_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.merchantLevels.create');
    }

    public function store(StoreMerchantLevelRequest $request)
    {
        $merchantLevel = MerchantLevel::create($request->all());

        return redirect()->route('admin.merchant-levels.index');
    }

    public function edit(MerchantLevel $merchantLevel)
    {
        abort_if(Gate::denies('merchant_level_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.merchantLevels.edit', compact('merchantLevel'));
    }

    public function update(UpdateMerchantLevelRequest $request, MerchantLevel $merchantLevel)
    {
        $merchantLevel->update($request->all());

        return redirect()->route('admin.merchant-levels.index');
    }

    public function show(MerchantLevel $merchantLevel)
    {
        abort_if(Gate::denies('merchant_level_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.merchantLevels.show', compact('merchantLevel'));
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

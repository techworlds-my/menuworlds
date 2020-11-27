<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyItemCatrgoryRequest;
use App\Http\Requests\StoreItemCatrgoryRequest;
use App\Http\Requests\UpdateItemCatrgoryRequest;
use App\Models\ItemCatrgory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ItemCatrgoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('item_catrgory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ItemCatrgory::query()->select(sprintf('%s.*', (new ItemCatrgory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'item_catrgory_show';
                $editGate      = 'item_catrgory_edit';
                $deleteGate    = 'item_catrgory_delete';
                $crudRoutePart = 'item-catrgories';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : "";
            });
            $table->editColumn('is_enable', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_enable ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'is_enable']);

            return $table->make(true);
        }

        return view('admin.itemCatrgories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('item_catrgory_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.itemCatrgories.create');
    }

    public function store(StoreItemCatrgoryRequest $request)
    {
        $itemCatrgory = ItemCatrgory::create($request->all());

        return redirect()->route('admin.item-catrgories.index');
    }

    public function edit(ItemCatrgory $itemCatrgory)
    {
        abort_if(Gate::denies('item_catrgory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.itemCatrgories.edit', compact('itemCatrgory'));
    }

    public function update(UpdateItemCatrgoryRequest $request, ItemCatrgory $itemCatrgory)
    {
        $itemCatrgory->update($request->all());

        return redirect()->route('admin.item-catrgories.index');
    }

    public function show(ItemCatrgory $itemCatrgory)
    {
        abort_if(Gate::denies('item_catrgory_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.itemCatrgories.show', compact('itemCatrgory'));
    }

    public function destroy(ItemCatrgory $itemCatrgory)
    {
        abort_if(Gate::denies('item_catrgory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemCatrgory->delete();

        return back();
    }

    public function massDestroy(MassDestroyItemCatrgoryRequest $request)
    {
        ItemCatrgory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

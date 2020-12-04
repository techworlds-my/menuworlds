<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyItemSubCateogryRequest;
use App\Http\Requests\StoreItemSubCateogryRequest;
use App\Http\Requests\UpdateItemSubCateogryRequest;
use App\Models\ItemCatrgory;
use App\Models\ItemSubCateogry;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ItemSubCateogryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('item_sub_cateogry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ItemSubCateogry::with(['item_category'])->select(sprintf('%s.*', (new ItemSubCateogry)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'item_sub_cateogry_show';
                $editGate      = 'item_sub_cateogry_edit';
                $deleteGate    = 'item_sub_cateogry_delete';
                $crudRoutePart = 'item-sub-cateogries';

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
            $table->addColumn('item_category_title', function ($row) {
                return $row->item_category ? $row->item_category->title : '';
            });

            $table->editColumn('is_enable', function ($row) {
                return $row->is_enable ? $row->is_enable : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'item_category']);

            return $table->make(true);
        }

        $item_catrgories = ItemCatrgory::get();

        return view('admin.itemSubCateogries.index', compact('item_catrgories'));
    }

    public function create()
    {
        abort_if(Gate::denies('item_sub_cateogry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item_categories = ItemCatrgory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.itemSubCateogries.create', compact('item_categories'));
    }

    public function store(StoreItemSubCateogryRequest $request)
    {
        $itemSubCateogry = ItemSubCateogry::create($request->all());

        return redirect()->route('admin.item-sub-cateogries.index');
    }

    public function edit(ItemSubCateogry $itemSubCateogry)
    {
        abort_if(Gate::denies('item_sub_cateogry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item_categories = ItemCatrgory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $itemSubCateogry->load('item_category');

        return view('admin.itemSubCateogries.edit', compact('item_categories', 'itemSubCateogry'));
    }

    public function update(UpdateItemSubCateogryRequest $request, ItemSubCateogry $itemSubCateogry)
    {
        $itemSubCateogry->update($request->all());

        return redirect()->route('admin.item-sub-cateogries.index');
    }

    public function show(ItemSubCateogry $itemSubCateogry)
    {
        abort_if(Gate::denies('item_sub_cateogry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemSubCateogry->load('item_category');

        return view('admin.itemSubCateogries.show', compact('itemSubCateogry'));
    }

    public function destroy(ItemSubCateogry $itemSubCateogry)
    {
        abort_if(Gate::denies('item_sub_cateogry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemSubCateogry->delete();

        return back();
    }

    public function massDestroy(MassDestroyItemSubCateogryRequest $request)
    {
        ItemSubCateogry::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

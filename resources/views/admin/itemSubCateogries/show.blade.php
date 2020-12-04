@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.itemSubCateogry.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.item-sub-cateogries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.itemSubCateogry.fields.id') }}
                        </th>
                        <td>
                            {{ $itemSubCateogry->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemSubCateogry.fields.title') }}
                        </th>
                        <td>
                            {{ $itemSubCateogry->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemSubCateogry.fields.item_category') }}
                        </th>
                        <td>
                            {{ $itemSubCateogry->item_category->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemSubCateogry.fields.is_enable') }}
                        </th>
                        <td>
                            {{ $itemSubCateogry->is_enable }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.item-sub-cateogries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.itemSubCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.item-sub-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.itemSubCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $itemSubCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemSubCategory.fields.title') }}
                        </th>
                        <td>
                            {{ $itemSubCategory->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemSubCategory.fields.is_enable') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $itemSubCategory->is_enable ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemSubCategory.fields.category') }}
                        </th>
                        <td>
                            {{ $itemSubCategory->category->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemSubCategory.fields.merchant') }}
                        </th>
                        <td>
                            {{ $itemSubCategory->merchant->company_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemSubCategory.fields.image') }}
                        </th>
                        <td>
                            @if($itemSubCategory->image)
                                <a href="{{ $itemSubCategory->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $itemSubCategory->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemSubCategory.fields.parent') }}
                        </th>
                        <td>
                            {{ $itemSubCategory->parent->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.item-sub-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.itemManagement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.item-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManagement.fields.id') }}
                        </th>
                        <td>
                            {{ $itemManagement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManagement.fields.title') }}
                        </th>
                        <td>
                            {{ $itemManagement->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManagement.fields.price') }}
                        </th>
                        <td>
                            {{ $itemManagement->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManagement.fields.image') }}
                        </th>
                        <td>
                            @foreach($itemManagement->image as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManagement.fields.sales_price') }}
                        </th>
                        <td>
                            {{ $itemManagement->sales_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManagement.fields.is_recommended') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $itemManagement->is_recommended ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManagement.fields.is_popular') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $itemManagement->is_popular ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManagement.fields.is_new') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $itemManagement->is_new ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManagement.fields.rate') }}
                        </th>
                        <td>
                            {{ $itemManagement->rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManagement.fields.is_active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $itemManagement->is_active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManagement.fields.is_veg') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $itemManagement->is_veg ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManagement.fields.is_halal') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $itemManagement->is_halal ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManagement.fields.sub_category') }}
                        </th>
                        <td>
                            {{ $itemManagement->sub_category->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManagement.fields.category') }}
                        </th>
                        <td>
                            {{ $itemManagement->category->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemManagement.fields.merchant') }}
                        </th>
                        <td>
                            {{ $itemManagement->merchant->company_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.item-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
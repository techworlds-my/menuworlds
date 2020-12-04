@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.merchantSubCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.merchant-sub-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantSubCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $merchantSubCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantSubCategory.fields.sub_category') }}
                        </th>
                        <td>
                            {{ $merchantSubCategory->sub_category }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantSubCategory.fields.in_enable') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $merchantSubCategory->in_enable ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantSubCategory.fields.category') }}
                        </th>
                        <td>
                            {{ $merchantSubCategory->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantSubCategory.fields.image') }}
                        </th>
                        <td>
                            @if($merchantSubCategory->image)
                                <a href="{{ $merchantSubCategory->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $merchantSubCategory->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantSubCategory.fields.parent') }}
                        </th>
                        <td>
                            {{ $merchantSubCategory->parent }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.merchant-sub-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
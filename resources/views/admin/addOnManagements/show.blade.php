@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.addOnManagement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-on-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.addOnManagement.fields.id') }}
                        </th>
                        <td>
                            {{ $addOnManagement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addOnManagement.fields.title') }}
                        </th>
                        <td>
                            {{ $addOnManagement->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addOnManagement.fields.price') }}
                        </th>
                        <td>
                            {{ $addOnManagement->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addOnManagement.fields.is_enable') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $addOnManagement->is_enable ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addOnManagement.fields.item') }}
                        </th>
                        <td>
                            {{ $addOnManagement->item }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addOnManagement.fields.category') }}
                        </th>
                        <td>
                            {{ $addOnManagement->category->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-on-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.voucherCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.voucher-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $voucherCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherCategory.fields.category') }}
                        </th>
                        <td>
                            {{ $voucherCategory->category }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherCategory.fields.is_enable') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $voucherCategory->is_enable ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.voucher-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.seat.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.seats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.seat.fields.id') }}
                        </th>
                        <td>
                            {{ $seat->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.seat.fields.used') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $seat->used ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.seat.fields.time_start') }}
                        </th>
                        <td>
                            {{ $seat->time_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.seat.fields.time_end') }}
                        </th>
                        <td>
                            {{ $seat->time_end }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.seat.fields.order') }}
                        </th>
                        <td>
                            {{ $seat->order->order ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.seats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
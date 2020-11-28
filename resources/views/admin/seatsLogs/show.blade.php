@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.seatsLog.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.seats-logs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.seatsLog.fields.id') }}
                        </th>
                        <td>
                            {{ $seatsLog->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.seatsLog.fields.order') }}
                        </th>
                        <td>
                            {{ $seatsLog->order->order ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.seatsLog.fields.seats') }}
                        </th>
                        <td>
                            {{ $seatsLog->seats }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.seatsLog.fields.time_start') }}
                        </th>
                        <td>
                            {{ $seatsLog->time_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.seatsLog.fields.time_end') }}
                        </th>
                        <td>
                            {{ $seatsLog->time_end }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.seats-logs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
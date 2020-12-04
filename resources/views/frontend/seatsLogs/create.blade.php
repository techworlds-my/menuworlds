@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.seatsLog.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.seats-logs.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="order_id">{{ trans('cruds.seatsLog.fields.order') }}</label>
                            <select class="form-control select2" name="order_id" id="order_id">
                                @foreach($orders as $id => $order)
                                    <option value="{{ $id }}" {{ old('order_id') == $id ? 'selected' : '' }}>{{ $order }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.seatsLog.fields.order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="seats">{{ trans('cruds.seatsLog.fields.seats') }}</label>
                            <input class="form-control" type="number" name="seats" id="seats" value="{{ old('seats', '') }}" step="1">
                            @if($errors->has('seats'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('seats') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.seatsLog.fields.seats_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="time_start">{{ trans('cruds.seatsLog.fields.time_start') }}</label>
                            <input class="form-control datetime" type="text" name="time_start" id="time_start" value="{{ old('time_start') }}">
                            @if($errors->has('time_start'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('time_start') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.seatsLog.fields.time_start_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="time_end">{{ trans('cruds.seatsLog.fields.time_end') }}</label>
                            <input class="form-control datetime" type="text" name="time_end" id="time_end" value="{{ old('time_end') }}">
                            @if($errors->has('time_end'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('time_end') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.seatsLog.fields.time_end_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
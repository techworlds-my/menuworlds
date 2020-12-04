@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.city.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.cities.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="city">{{ trans('cruds.city.fields.city') }}</label>
                            <input class="form-control" type="text" name="city" id="city" value="{{ old('city', '') }}" required>
                            @if($errors->has('city'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('city') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.city.fields.city_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="states_id">{{ trans('cruds.city.fields.states') }}</label>
                            <select class="form-control select2" name="states_id" id="states_id" required>
                                @foreach($states as $id => $states)
                                    <option value="{{ $id }}" {{ old('states_id') == $id ? 'selected' : '' }}>{{ $states }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('states'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('states') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.city.fields.states_helper') }}</span>
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
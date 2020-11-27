@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.state.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.states.update", [$state->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="states">{{ trans('cruds.state.fields.states') }}</label>
                            <input class="form-control" type="text" name="states" id="states" value="{{ old('states', $state->states) }}" required>
                            @if($errors->has('states'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('states') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.state.fields.states_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_enable" value="0">
                                <input type="checkbox" name="is_enable" id="is_enable" value="1" {{ $state->is_enable || old('is_enable', 0) === 1 ? 'checked' : '' }}>
                                <label for="is_enable">{{ trans('cruds.state.fields.is_enable') }}</label>
                            </div>
                            @if($errors->has('is_enable'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_enable') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.state.fields.is_enable_helper') }}</span>
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
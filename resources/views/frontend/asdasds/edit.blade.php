@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.asdasd.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.asdasds.update", [$asdasd->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="adasda">{{ trans('cruds.asdasd.fields.adasda') }}</label>
                            <input class="form-control" type="text" name="adasda" id="adasda" value="{{ old('adasda', $asdasd->adasda) }}">
                            @if($errors->has('adasda'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('adasda') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.asdasd.fields.adasda_helper') }}</span>
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
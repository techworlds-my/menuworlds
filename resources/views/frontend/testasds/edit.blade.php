@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.testasd.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.testasds.update", [$testasd->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="asd">{{ trans('cruds.testasd.fields.asd') }}</label>
                            <input class="form-control" type="text" name="asd" id="asd" value="{{ old('asd', $testasd->asd) }}">
                            @if($errors->has('asd'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('asd') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.testasd.fields.asd_helper') }}</span>
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
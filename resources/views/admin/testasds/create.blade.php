@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.testasd.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.testasds.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="asd">{{ trans('cruds.testasd.fields.asd') }}</label>
                <input class="form-control {{ $errors->has('asd') ? 'is-invalid' : '' }}" type="text" name="asd" id="asd" value="{{ old('asd', '') }}">
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



@endsection
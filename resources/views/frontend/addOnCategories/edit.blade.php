@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.addOnCategory.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.add-on-categories.update", [$addOnCategory->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.addOnCategory.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $addOnCategory->title) }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addOnCategory.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="checkbox" name="is_enable" id="is_enable" value="1" {{ $addOnCategory->is_enable || old('is_enable', 0) === 1 ? 'checked' : '' }} required>
                                <label class="required" for="is_enable">{{ trans('cruds.addOnCategory.fields.is_enable') }}</label>
                            </div>
                            @if($errors->has('is_enable'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_enable') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addOnCategory.fields.is_enable_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="created_by_id">{{ trans('cruds.addOnCategory.fields.created_by') }}</label>
                            <select class="form-control select2" name="created_by_id" id="created_by_id">
                                @foreach($created_bies as $id => $created_by)
                                    <option value="{{ $id }}" {{ (old('created_by_id') ? old('created_by_id') : $addOnCategory->created_by->id ?? '') == $id ? 'selected' : '' }}>{{ $created_by }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('created_by'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('created_by') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addOnCategory.fields.created_by_helper') }}</span>
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
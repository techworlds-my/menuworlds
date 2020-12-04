@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.itemSubCategory.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.item-sub-categories.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.itemSubCategory.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemSubCategory.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_enable" value="0">
                                <input type="checkbox" name="is_enable" id="is_enable" value="1" {{ old('is_enable', 0) == 1 ? 'checked' : '' }}>
                                <label for="is_enable">{{ trans('cruds.itemSubCategory.fields.is_enable') }}</label>
                            </div>
                            @if($errors->has('is_enable'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_enable') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemSubCategory.fields.is_enable_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="category_id">{{ trans('cruds.itemSubCategory.fields.category') }}</label>
                            <select class="form-control select2" name="category_id" id="category_id">
                                @foreach($categories as $id => $category)
                                    <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemSubCategory.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="merchant_id">{{ trans('cruds.itemSubCategory.fields.merchant') }}</label>
                            <select class="form-control select2" name="merchant_id" id="merchant_id">
                                @foreach($merchants as $id => $merchant)
                                    <option value="{{ $id }}" {{ old('merchant_id') == $id ? 'selected' : '' }}>{{ $merchant }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('merchant'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('merchant') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemSubCategory.fields.merchant_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="image">{{ trans('cruds.itemSubCategory.fields.image') }}</label>
                            <div class="needsclick dropzone" id="image-dropzone">
                            </div>
                            @if($errors->has('image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemSubCategory.fields.image_helper') }}</span>
                        </div>
                        <div class="form-group">
<<<<<<< HEAD
=======
                            <label for="parent_id">{{ trans('cruds.itemSubCategory.fields.parent') }}</label>
                            <select class="form-control select2" name="parent_id" id="parent_id">
                                @foreach($parents as $id => $parent)
                                    <option value="{{ $id }}" {{ old('parent_id') == $id ? 'selected' : '' }}>{{ $parent }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('parent'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('parent') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemSubCategory.fields.parent_helper') }}</span>
                        </div>
                        <div class="form-group">
>>>>>>> 2c4a47a5c3e5d5ea4cf11bf66ce3c586c4dbcc8f
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

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.item-sub-categories.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($itemSubCategory) && $itemSubCategory->image)
      var file = {!! json_encode($itemSubCategory->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection
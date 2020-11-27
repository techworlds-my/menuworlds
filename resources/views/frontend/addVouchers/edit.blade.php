@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.addVoucher.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.add-vouchers.update", [$addVoucher->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="voucher_code">{{ trans('cruds.addVoucher.fields.voucher_code') }}</label>
                            <input class="form-control" type="text" name="voucher_code" id="voucher_code" value="{{ old('voucher_code', $addVoucher->voucher_code) }}" required>
                            @if($errors->has('voucher_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('voucher_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addVoucher.fields.voucher_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.addVoucher.fields.discount_type') }}</label>
                            <select class="form-control" name="discount_type" id="discount_type">
                                <option value disabled {{ old('discount_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\AddVoucher::DISCOUNT_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('discount_type', $addVoucher->discount_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('discount_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('discount_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addVoucher.fields.discount_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="value">{{ trans('cruds.addVoucher.fields.value') }}</label>
                            <input class="form-control" type="number" name="value" id="value" value="{{ old('value', $addVoucher->value) }}" step="0.01" required>
                            @if($errors->has('value'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('value') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addVoucher.fields.value_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="expired_time">{{ trans('cruds.addVoucher.fields.expired_time') }}</label>
                            <input class="form-control" type="text" name="expired_time" id="expired_time" value="{{ old('expired_time', $addVoucher->expired_time) }}">
                            @if($errors->has('expired_time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('expired_time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addVoucher.fields.expired_time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.addVoucher.fields.description') }}</label>
                            <textarea class="form-control ckeditor" name="description" id="description">{!! old('description', $addVoucher->description) !!}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addVoucher.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="redeem_point">{{ trans('cruds.addVoucher.fields.redeem_point') }}</label>
                            <input class="form-control" type="number" name="redeem_point" id="redeem_point" value="{{ old('redeem_point', $addVoucher->redeem_point) }}" step="0.01">
                            @if($errors->has('redeem_point'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('redeem_point') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addVoucher.fields.redeem_point_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_free_shipping" value="0">
                                <input type="checkbox" name="is_free_shipping" id="is_free_shipping" value="1" {{ $addVoucher->is_free_shipping || old('is_free_shipping', 0) === 1 ? 'checked' : '' }}>
                                <label for="is_free_shipping">{{ trans('cruds.addVoucher.fields.is_free_shipping') }}</label>
                            </div>
                            @if($errors->has('is_free_shipping'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_free_shipping') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addVoucher.fields.is_free_shipping_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_credit_purchase" value="0">
                                <input type="checkbox" name="is_credit_purchase" id="is_credit_purchase" value="1" {{ $addVoucher->is_credit_purchase || old('is_credit_purchase', 0) === 1 ? 'checked' : '' }}>
                                <label for="is_credit_purchase">{{ trans('cruds.addVoucher.fields.is_credit_purchase') }}</label>
                            </div>
                            @if($errors->has('is_credit_purchase'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_credit_purchase') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addVoucher.fields.is_credit_purchase_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/add-vouchers/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $addVoucher->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection
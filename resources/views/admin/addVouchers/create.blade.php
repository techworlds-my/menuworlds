@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.addVoucher.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.add-vouchers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="voucher_code">{{ trans('cruds.addVoucher.fields.voucher_code') }}</label>
                <input class="form-control {{ $errors->has('voucher_code') ? 'is-invalid' : '' }}" type="text" name="voucher_code" id="voucher_code" value="{{ old('voucher_code', '') }}" required>
                @if($errors->has('voucher_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('voucher_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addVoucher.fields.voucher_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.addVoucher.fields.discount_type') }}</label>
                <select class="form-control {{ $errors->has('discount_type') ? 'is-invalid' : '' }}" name="discount_type" id="discount_type">
                    <option value disabled {{ old('discount_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\AddVoucher::DISCOUNT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('discount_type', 'amount') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="number" name="value" id="value" value="{{ old('value', '') }}" step="0.01" required>
                @if($errors->has('value'))
                    <div class="invalid-feedback">
                        {{ $errors->first('value') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addVoucher.fields.value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.addVoucher.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addVoucher.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="redeem_point">{{ trans('cruds.addVoucher.fields.redeem_point') }}</label>
                <input class="form-control {{ $errors->has('redeem_point') ? 'is-invalid' : '' }}" type="number" name="redeem_point" id="redeem_point" value="{{ old('redeem_point', '') }}" step="0.01">
                @if($errors->has('redeem_point'))
                    <div class="invalid-feedback">
                        {{ $errors->first('redeem_point') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addVoucher.fields.redeem_point_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_free_shipping') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_free_shipping" value="0">
                    <input class="form-check-input" type="checkbox" name="is_free_shipping" id="is_free_shipping" value="1" {{ old('is_free_shipping', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_free_shipping">{{ trans('cruds.addVoucher.fields.is_free_shipping') }}</label>
                </div>
                @if($errors->has('is_free_shipping'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_free_shipping') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addVoucher.fields.is_free_shipping_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_credit_purchase') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_credit_purchase" value="0">
                    <input class="form-check-input" type="checkbox" name="is_credit_purchase" id="is_credit_purchase" value="1" {{ old('is_credit_purchase', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_credit_purchase">{{ trans('cruds.addVoucher.fields.is_credit_purchase') }}</label>
                </div>
                @if($errors->has('is_credit_purchase'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_credit_purchase') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addVoucher.fields.is_credit_purchase_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expired_time">{{ trans('cruds.addVoucher.fields.expired_time') }}</label>
                <input class="form-control datetime {{ $errors->has('expired_time') ? 'is-invalid' : '' }}" type="text" name="expired_time" id="expired_time" value="{{ old('expired_time') }}">
                @if($errors->has('expired_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expired_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addVoucher.fields.expired_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="select_items">{{ trans('cruds.addVoucher.fields.select_item') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('select_items') ? 'is-invalid' : '' }}" name="select_items[]" id="select_items" multiple>
                    @foreach($select_items as $id => $select_item)
                        <option value="{{ $id }}" {{ in_array($id, old('select_items', [])) ? 'selected' : '' }}>{{ $select_item }}</option>
                    @endforeach
                </select>
                @if($errors->has('select_items'))
                    <div class="invalid-feedback">
                        {{ $errors->first('select_items') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addVoucher.fields.select_item_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="min_spend">{{ trans('cruds.addVoucher.fields.min_spend') }}</label>
                <input class="form-control {{ $errors->has('min_spend') ? 'is-invalid' : '' }}" type="number" name="min_spend" id="min_spend" value="{{ old('min_spend', '') }}" step="1">
                @if($errors->has('min_spend'))
                    <div class="invalid-feedback">
                        {{ $errors->first('min_spend') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addVoucher.fields.min_spend_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="max_spend">{{ trans('cruds.addVoucher.fields.max_spend') }}</label>
                <input class="form-control {{ $errors->has('max_spend') ? 'is-invalid' : '' }}" type="number" name="max_spend" id="max_spend" value="{{ old('max_spend', '') }}" step="1">
                @if($errors->has('max_spend'))
                    <div class="invalid-feedback">
                        {{ $errors->first('max_spend') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addVoucher.fields.max_spend_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('excluded_sales_item') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="excluded_sales_item" value="0">
                    <input class="form-check-input" type="checkbox" name="excluded_sales_item" id="excluded_sales_item" value="1" {{ old('excluded_sales_item', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="excluded_sales_item">{{ trans('cruds.addVoucher.fields.excluded_sales_item') }}</label>
                </div>
                @if($errors->has('excluded_sales_item'))
                    <div class="invalid-feedback">
                        {{ $errors->first('excluded_sales_item') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addVoucher.fields.excluded_sales_item_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="usage_limit">{{ trans('cruds.addVoucher.fields.usage_limit') }}</label>
                <input class="form-control {{ $errors->has('usage_limit') ? 'is-invalid' : '' }}" type="number" name="usage_limit" id="usage_limit" value="{{ old('usage_limit', '') }}" step="1">
                @if($errors->has('usage_limit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('usage_limit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addVoucher.fields.usage_limit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="limit_per_user">{{ trans('cruds.addVoucher.fields.limit_per_user') }}</label>
                <input class="form-control {{ $errors->has('limit_per_user') ? 'is-invalid' : '' }}" type="number" name="limit_per_user" id="limit_per_user" value="{{ old('limit_per_user', '') }}" step="1">
                @if($errors->has('limit_per_user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('limit_per_user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addVoucher.fields.limit_per_user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="merchant_id">{{ trans('cruds.addVoucher.fields.merchant') }}</label>
                <select class="form-control select2 {{ $errors->has('merchant') ? 'is-invalid' : '' }}" name="merchant_id" id="merchant_id">
                    @foreach($merchants as $id => $merchant)
                        <option value="{{ $id }}" {{ old('merchant_id') == $id ? 'selected' : '' }}>{{ $merchant }}</option>
                    @endforeach
                </select>
                @if($errors->has('merchant'))
                    <div class="invalid-feedback">
                        {{ $errors->first('merchant') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addVoucher.fields.merchant_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="categories">{{ trans('cruds.addVoucher.fields.category') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" name="categories[]" id="categories" multiple>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ in_array($id, old('categories', [])) ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <div class="invalid-feedback">
                        {{ $errors->first('categories') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addVoucher.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_categories">{{ trans('cruds.addVoucher.fields.sub_category') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('sub_categories') ? 'is-invalid' : '' }}" name="sub_categories[]" id="sub_categories" multiple>
                    @foreach($sub_categories as $id => $sub_category)
                        <option value="{{ $id }}" {{ in_array($id, old('sub_categories', [])) ? 'selected' : '' }}>{{ $sub_category }}</option>
                    @endforeach
                </select>
                @if($errors->has('sub_categories'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_categories') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addVoucher.fields.sub_category_helper') }}</span>
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
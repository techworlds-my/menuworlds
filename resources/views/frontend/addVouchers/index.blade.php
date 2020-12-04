@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('add_voucher_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.add-vouchers.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.addVoucher.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.addVoucher.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-AddVoucher">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.voucher_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.discount_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.value') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.redeem_point') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.is_free_shipping') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.is_credit_purchase') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.expired_time') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.select_item') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.min_spend') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.max_spend') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.excluded_sales_item') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.usage_limit') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.limit_per_user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.merchant') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.category') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.sub_category') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\AddVoucher::DISCOUNT_TYPE_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($item_managements as $key => $item)
                                                <option value="{{ $item->title }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($merchant_managements as $key => $item)
                                                <option value="{{ $item->company_name }}">{{ $item->company_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($item_categories as $key => $item)
                                                <option value="{{ $item->title }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($item_sub_categories as $key => $item)
                                                <option value="{{ $item->title }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($addVouchers as $key => $addVoucher)
                                    <tr data-entry-id="{{ $addVoucher->id }}">
                                        <td>
                                            {{ $addVoucher->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addVoucher->voucher_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\AddVoucher::DISCOUNT_TYPE_SELECT[$addVoucher->discount_type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addVoucher->value ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addVoucher->redeem_point ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $addVoucher->is_free_shipping ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $addVoucher->is_free_shipping ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $addVoucher->is_credit_purchase ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $addVoucher->is_credit_purchase ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $addVoucher->expired_time ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($addVoucher->select_items as $key => $item)
                                                <span>{{ $item->title }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $addVoucher->min_spend ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addVoucher->max_spend ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $addVoucher->excluded_sales_item ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $addVoucher->excluded_sales_item ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $addVoucher->usage_limit ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addVoucher->limit_per_user ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addVoucher->merchant->company_name ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($addVoucher->categories as $key => $item)
                                                <span>{{ $item->title }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($addVoucher->sub_categories as $key => $item)
                                                <span>{{ $item->title }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('add_voucher_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.add-vouchers.show', $addVoucher->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('add_voucher_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.add-vouchers.edit', $addVoucher->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('add_voucher_delete')
                                                <form action="{{ route('frontend.add-vouchers.destroy', $addVoucher->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('add_voucher_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.add-vouchers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-AddVoucher:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value
      table
        .column($(this).parent().index())
        .search(value, strict)
        .draw()
  });
})

</script>
@endsection
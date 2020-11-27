@can('add_voucher_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.add-vouchers.create') }}">
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
            <table class=" table table-bordered table-striped table-hover datatable datatable-selectedItemAddVouchers">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
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
                            {{ trans('cruds.addVoucher.fields.expired_time') }}
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
                            {{ trans('cruds.addVoucher.fields.selected_item') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($addVouchers as $key => $addVoucher)
                        <tr data-entry-id="{{ $addVoucher->id }}">
                            <td>

                            </td>
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
                                {{ $addVoucher->expired_time ?? '' }}
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
                                {{ $addVoucher->selected_item->title ?? '' }}
                            </td>
                            <td>
                                @can('add_voucher_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.add-vouchers.show', $addVoucher->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('add_voucher_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.add-vouchers.edit', $addVoucher->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('add_voucher_delete')
                                    <form action="{{ route('admin.add-vouchers.destroy', $addVoucher->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('add_voucher_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.add-vouchers.massDestroy') }}",
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
  let table = $('.datatable-selectedItemAddVouchers:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
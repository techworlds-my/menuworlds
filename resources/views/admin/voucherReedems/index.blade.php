@extends('layouts.admin')
@section('content')
@can('voucher_reedem_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.voucher-reedems.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.voucherReedem.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.voucherReedem.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-VoucherReedem">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.voucherReedem.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.voucherReedem.fields.voucher_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.voucherReedem.fields.username') }}
                        </th>
                        <th>
                            {{ trans('cruds.voucherReedem.fields.merchant') }}
                        </th>
                        <th>
                            {{ trans('cruds.voucherReedem.fields.redeem_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.voucherReedem.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.voucherReedem.fields.type') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($voucherReedems as $key => $voucherReedem)
                        <tr data-entry-id="{{ $voucherReedem->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $voucherReedem->id ?? '' }}
                            </td>
                            <td>
                                {{ $voucherReedem->voucher_code->voucher_code ?? '' }}
                            </td>
                            <td>
                                {{ $voucherReedem->username->name ?? '' }}
                            </td>
                            <td>
                                {{ $voucherReedem->merchant->company_name ?? '' }}
                            </td>
                            <td>
                                {{ $voucherReedem->redeem_date ?? '' }}
                            </td>
                            <td>
                                {{ $voucherReedem->amount ?? '' }}
                            </td>
                            <td>
                                {{ $voucherReedem->type ?? '' }}
                            </td>
                            <td>
                                @can('voucher_reedem_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.voucher-reedems.show', $voucherReedem->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('voucher_reedem_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.voucher-reedems.edit', $voucherReedem->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('voucher_reedem_delete')
                                    <form action="{{ route('admin.voucher-reedems.destroy', $voucherReedem->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('voucher_reedem_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.voucher-reedems.massDestroy') }}",
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
  let table = $('.datatable-VoucherReedem:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
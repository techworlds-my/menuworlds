@extends('layouts.admin')
@section('content')
@can('order_management_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.order-managements.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.orderManagement.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.orderManagement.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-OrderManagement">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.orderManagement.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderManagement.fields.order') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderManagement.fields.username') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderManagement.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderManagement.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderManagement.fields.delivery_charge') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderManagement.fields.tax') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderManagement.fields.total') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderManagement.fields.comment') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderManagement.fields.merchant') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderManagement.fields.payment_method') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderManagement.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderManagement.fields.voucher_used') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderManagement.fields.voucher') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderManagement.fields.order_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderManagement.fields.time_needed') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderManagements as $key => $orderManagement)
                        <tr data-entry-id="{{ $orderManagement->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $orderManagement->id ?? '' }}
                            </td>
                            <td>
                                {{ $orderManagement->order ?? '' }}
                            </td>
                            <td>
                                {{ $orderManagement->username ?? '' }}
                            </td>
                            <td>
                                {{ $orderManagement->address ?? '' }}
                            </td>
                            <td>
                                {{ $orderManagement->price ?? '' }}
                            </td>
                            <td>
                                {{ $orderManagement->delivery_charge ?? '' }}
                            </td>
                            <td>
                                {{ $orderManagement->tax ?? '' }}
                            </td>
                            <td>
                                {{ $orderManagement->total ?? '' }}
                            </td>
                            <td>
                                {{ $orderManagement->comment ?? '' }}
                            </td>
                            <td>
                                {{ $orderManagement->merchant->company_name ?? '' }}
                            </td>
                            <td>
                                {{ $orderManagement->payment_method->method ?? '' }}
                            </td>
                            <td>
                                {{ $orderManagement->status->status ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $orderManagement->voucher_used ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $orderManagement->voucher_used ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $orderManagement->voucher->voucher_code ?? '' }}
                            </td>
                            <td>
                                {{ $orderManagement->order_type->type ?? '' }}
                            </td>
                            <td>
                                {{ $orderManagement->time_needed ?? '' }}
                            </td>
                            <td>
                                @can('order_management_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.order-managements.show', $orderManagement->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('order_management_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.order-managements.edit', $orderManagement->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('order_management_delete')
                                    <form action="{{ route('admin.order-managements.destroy', $orderManagement->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('order_management_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.order-managements.massDestroy') }}",
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
  let table = $('.datatable-OrderManagement:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('order_item_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.order-items.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.orderItem.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.orderItem.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-OrderItem">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderItem.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.orderItem.fields.quantity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.orderItem.fields.price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.orderItem.fields.order') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.orderItem.fields.add_on') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.orderItem.fields.add_on_price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.orderItem.fields.item') }}
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
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($order_managements as $key => $item)
                                                <option value="{{ $item->order }}">{{ $item->order }}</option>
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
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($item_managements as $key => $item)
                                                <option value="{{ $item->title }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderItems as $key => $orderItem)
                                    <tr data-entry-id="{{ $orderItem->id }}">
                                        <td>
                                            {{ $orderItem->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $orderItem->quantity ?? '' }}
                                        </td>
                                        <td>
                                            {{ $orderItem->price ?? '' }}
                                        </td>
                                        <td>
                                            {{ $orderItem->order->order ?? '' }}
                                        </td>
                                        <td>
                                            {{ $orderItem->add_on ?? '' }}
                                        </td>
                                        <td>
                                            {{ $orderItem->add_on_price ?? '' }}
                                        </td>
                                        <td>
                                            {{ $orderItem->item->title ?? '' }}
                                        </td>
                                        <td>
                                            @can('order_item_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.order-items.show', $orderItem->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('order_item_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.order-items.edit', $orderItem->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('order_item_delete')
                                                <form action="{{ route('frontend.order-items.destroy', $orderItem->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('order_item_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.order-items.massDestroy') }}",
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
  let table = $('.datatable-OrderItem:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
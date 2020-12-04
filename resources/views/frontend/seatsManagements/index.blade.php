@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('seats_management_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.seats-managements.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.seatsManagement.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.seatsManagement.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-SeatsManagement">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.seatsManagement.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.seatsManagement.fields.used') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.seatsManagement.fields.time_start') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.seatsManagement.fields.time_end') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.seatsManagement.fields.order') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($seatsManagements as $key => $seatsManagement)
                                    <tr data-entry-id="{{ $seatsManagement->id }}">
                                        <td>
                                            {{ $seatsManagement->id ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $seatsManagement->used ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $seatsManagement->used ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $seatsManagement->time_start ?? '' }}
                                        </td>
                                        <td>
                                            {{ $seatsManagement->time_end ?? '' }}
                                        </td>
                                        <td>
                                            {{ $seatsManagement->order->order ?? '' }}
                                        </td>
                                        <td>
                                            @can('seats_management_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.seats-managements.show', $seatsManagement->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('seats_management_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.seats-managements.edit', $seatsManagement->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('seats_management_delete')
                                                <form action="{{ route('frontend.seats-managements.destroy', $seatsManagement->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('seats_management_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.seats-managements.massDestroy') }}",
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
  let table = $('.datatable-SeatsManagement:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
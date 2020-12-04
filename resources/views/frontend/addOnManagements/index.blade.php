@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('add_on_management_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.add-on-managements.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.addOnManagement.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.addOnManagement.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-AddOnManagement">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addOnManagement.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addOnManagement.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addOnManagement.fields.price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addOnManagement.fields.is_enable') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addOnManagement.fields.item') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addOnManagement.fields.category') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($addOnManagements as $key => $addOnManagement)
                                    <tr data-entry-id="{{ $addOnManagement->id }}">
                                        <td>
                                            {{ $addOnManagement->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addOnManagement->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addOnManagement->price ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $addOnManagement->is_enable ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $addOnManagement->is_enable ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $addOnManagement->item ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addOnManagement->category->title ?? '' }}
                                        </td>
                                        <td>
                                            @can('add_on_management_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.add-on-managements.show', $addOnManagement->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('add_on_management_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.add-on-managements.edit', $addOnManagement->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('add_on_management_delete')
                                                <form action="{{ route('frontend.add-on-managements.destroy', $addOnManagement->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('add_on_management_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.add-on-managements.massDestroy') }}",
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
  let table = $('.datatable-AddOnManagement:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
@extends('layouts.admin')
@section('content')
@can('jalan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.jalan.create") }}">
                {{ trans('global.add') }} {{ trans('global.jalan.title_singular') }}
            </a>

        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.jalan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.jalan.fields.id_user') }}
                        </th>
                        <th>
                            {{ trans('global.jalan.fields.image') }}
                        </th>
                        <th>
                            {{ trans('global.jalan.fields.deskripsi') }}
                        </th>
                        <th>
                             {{ trans('global.jalan.fields.alamat') }}
                        </th>
                        <th>
                             {{ trans('global.jalan.fields.kecamatan') }}
                        </th>
                        <th>
                             {{ trans('global.jalan.fields.latitude') }}
                        </th>
                        <th>
                            {{ trans('global.jalan.fields.longtitude') }}
                        </th>
                        <th>
                           {{ trans('global.jalan.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>

                    </tr>
                </thead>
                <tbody>
                     @foreach($datas as $key => $jalan)
                        <tr data-entry-id="{{ $jalan->idLapor }}">
                            <td>

                            </td>
                            <td>
                                {{ $jalan->idUser ?? '' }}
                            </td>
                            <td>
                                <img src="{{ asset('storage/image/'.$jalan->image) }}" title="jalan" width="100" height="100"/>
                            </td>
                            <td>
                                {{ $jalan->deskripsi ?? '' }}
                            </td>
                            <td>
                                {{ $jalan->alamat ?? '' }}
                            </td>
                            <td>
                                {{ $jalan->kecamatan ?? '' }}
                            </td>
                            <td>
                                {{ $jalan->latitude ?? '' }}
                            </td>
                            <td>
                                {{ $jalan->longtitude ?? '' }}
                            </td>
                            <td>
                                {{ $jalan->created_at ?? '' }}
                            </td>
                            <td>
                                @can('jalan_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.jalan.show', $jalan->idLapor) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('jalan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.jalan.edit', $jalan->idLapor) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('jalan_delete')
                                    <form action="{{ route('admin.jalan.destroy', $jalan->idLapor) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.jalan.massDestroy') }}",
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
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('jalan_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection

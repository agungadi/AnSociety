@extends('layouts.admin')
@section('content')
@can('jembatan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.jembatan.create") }}">
                {{ trans('global.add') }} {{ trans('global.jembatan.title_singular') }}
            </a>

        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.jembatan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.jembatan.fields.id_user') }}
                        </th>
                        <th>
                            {{ trans('global.jembatan.fields.image') }}
                        </th>
                        <th>
                            {{ trans('global.jembatan.fields.deskripsi') }}
                        </th>
                        <th>
                             {{ trans('global.jembatan.fields.alamat') }}
                        </th>
                        <th>
                             {{ trans('global.jembatan.fields.kecamatan') }}
                        </th>
                        <th>
                             {{ trans('global.jembatan.fields.latitude') }}
                        </th>
                        <th>
                            {{ trans('global.jembatan.fields.longtitude') }}
                        </th>
                        <th>
                           {{ trans('global.jembatan.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>

                    </tr>
                </thead>
                <tbody>
                     @foreach($jembatans as $key => $jembatan)
                        <tr data-entry-id="{{ $jembatan->idLapor }}">
                            <td>

                            </td>
                            <td>
                                {{ $jembatan->idUser ?? '' }}
                            </td>
                            <td>
                                <img src="{{ asset('storage/image/'.$jembatan->image) }}" title="jalan" width="100" height="100"/>
                            </td>
                            <td>
                                {{ $jembatan->deskripsi ?? '' }}
                            </td>
                            <td>
                                {{ $jembatan->alamat ?? '' }}
                            </td>
                            <td>
                                {{ $jembatan->kecamatan ?? '' }}
                            </td>
                            <td>
                                {{ $jembatan->latitude ?? '' }}
                            </td>
                            <td>
                                {{ $jembatan->longtitude ?? '' }}
                            </td>
                            <td>
                                {{ $jembatan->created_at ?? '' }}
                            </td>
                            <td>
                                @can('jembatan_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.jembatan.show', $jembatan->idLapor) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('jembatan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.jembatan.edit', $jembatan->idLapor) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('jembatan_delete')
                                    <form action="{{ route('admin.jembatan.destroy', $jembatan->idLapor) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.jembatan.massDestroy') }}",
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
@can('jembatan_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection

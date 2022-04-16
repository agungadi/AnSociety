@extends('layouts.admin')
@section('content')
@can('pengguna_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.pengguna.create") }}">
                {{ trans('global.add') }} {{ trans('global.pengguna.title_singular') }}
            </a>
            
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.pengguna.title_singular') }} {{ trans('global.list') }} 
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.pengguna.fields.id') }}
                        </th>
                        <th>
                            {{ trans('global.pengguna.fields.name') }}
                        </th>
                        <th>
                            {{ trans('global.pengguna.fields.email') }}
                        </th>
                        <th>
                            {{ trans('global.pengguna.fields.noHp') }}
                        </th>
                      
                        <th>
                             {{ trans('global.pengguna.fields.created_at') }}  
                        </th>
                        <th>
                            &nbsp;
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                     @foreach($penggunas as $key => $pengguna)
                        <tr data-entry-id="{{ $pengguna->id }}"> 
                            <td>

                            </td>
                            <td>
                                {{ $pengguna->id ?? '' }}
                            </td>
                            <td>
                                {{ $pengguna->name ?? '' }}
                            </td>
                            <td>
                                {{ $pengguna->email ?? '' }}
                            </td>
                            <td>
                                {{ $pengguna->noHP ?? '' }}
                            </td>
                            <td>
                                {{ $pengguna->created_at ?? '' }}
                            </td>
                            <td>
                                @can('pengguna_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pengguna.show', $pengguna->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('pengguna_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pengguna.edit', $pengguna->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('pengguna_delete')
                                    <form action="{{ route('admin.pengguna.destroy', $pengguna->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.pengguna.massDestroy') }}",
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
@can('pengguna_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
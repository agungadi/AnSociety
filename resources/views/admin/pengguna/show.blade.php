@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.pengguna.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.pengguna.fields.id') }}
                    </th>
                    <td>
                        {{ $pengguna->id }}
                    </td>
                </tr>
                <tr>
                <tr>
                    <th>
                        {{ trans('global.pengguna.fields.name') }}
                    </th>
                    <td>
                        {{ $pengguna->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.pengguna.fields.email') }}
                    </th>
                    <td>
                        {{ $pengguna->email }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.pengguna.fields.password') }}
                    </th>
                    <td>
                        {{ $pengguna->password }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.pengguna.fields.noHp') }}
                    </th>
                    <td>
                        {{ $pengguna->noHP }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.pengguna.fields.created_at') }}
                    </th>
                    <td>
                        {{ $pengguna->created_at }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
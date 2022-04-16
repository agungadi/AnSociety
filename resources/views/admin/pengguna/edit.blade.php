@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.pengguna.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.pengguna.update", [$pengguna->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.pengguna.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($pengguna) ? $pengguna->name : '') }}">
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.pengguna.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('global.pengguna.fields.email') }}*</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email', isset($pengguna) ? $pengguna->email : '') }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.pengguna.fields.email_helper') }}
                </p>
            </div>
           
            <div class="form-group {{ $errors->has('noHP') ? 'has-error' : '' }}">
                <label for="noHP">{{ trans('global.pengguna.fields.noHp') }}</label>
                <input type="text" id="noHP" name="noHP" class="form-control" value="{{ old('noHP', isset($pengguna) ? $pengguna->noHP : '') }}" step="0.01">
                @if($errors->has('alamat'))
                    <p class="help-block">
                        {{ $errors->first('noHP') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.pengguna.fields.noHp_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('global.pengguna.fields.password') }}</label>
                <input type="text" id="password" name="password" class="form-control" value="{{ old('password', isset($pengguna) ? $pengguna->password : '') }}" step="0.01">
                @if($errors->has('password'))
                    <p class="help-block">
                        {{ $errors->first('password') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.pengguna.fields.password_helper') }}
                </p>
            </div>
            
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
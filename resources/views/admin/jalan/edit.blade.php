@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.jalan.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.jalan.update", [$jalan->idLapor]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('idUser') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.jalan.fields.id_user') }}*</label>
                <input type="text" id="iduser" name="idUser" class="form-control" value="{{ old('idUser', isset($jalan) ? $jalan->idUser : '') }}">
                @if($errors->has('idUser'))
                    <p class="help-block">
                        {{ $errors->first('idUser') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.jalan.fields.id_user_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                <label for="image">{{ trans('global.jalan.fields.image') }}*</label>
                <input type="text" id="image" name="image" class="form-control" value="{{ old('image', isset($jalan) ? $jalan->image : '') }}">
                @if($errors->has('image'))
                    <p class="help-block">
                        {{ $errors->first('image') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.jalan.fields.image_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : '' }}">
                <label for="deskripsi">{{ trans('global.jalan.fields.deskripsi') }}</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control ">{{ old('deskripsi', isset($jalan) ? $jalan->deskripsi : '') }}</textarea>
                @if($errors->has('deskripsi'))
                    <p class="help-block">
                        {{ $errors->first('deskripsi') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.jalan.fields.deskripsi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                <label for="alamat">{{ trans('global.jalan.fields.alamat') }}</label>
                <input type="text" id="alamat" name="alamat" class="form-control" value="{{ old('alamat', isset($jalan) ? $jalan->alamat : '') }}" step="0.01">
                @if($errors->has('alamat'))
                    <p class="help-block">
                        {{ $errors->first('alamat') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.jalan.fields.alamat_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('kecamatan') ? 'has-error' : '' }}">
                <label for="kecamatan">{{ trans('global.jalan.fields.kecamatan') }}</label>
                <input type="text" id="kecamatan" name="kecamatan" class="form-control" value="{{ old('kecamatan', isset($jalan) ? $jalan->kecamatan : '') }}" step="0.01">
                @if($errors->has('kecamatan'))
                    <p class="help-block">
                        {{ $errors->first('kecamatan') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.jalan.fields.kecamatan_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('latitude') ? 'has-error' : '' }}">
                <label for="latitude">{{ trans('global.jalan.fields.latitude') }}</label>
                <input type="text" id="latitude" name="latitude" class="form-control" value="{{ old('latitude', isset($jalan) ? $jalan->latitude : '') }}" step="0.01">
                @if($errors->has('latitude'))
                    <p class="help-block">
                        {{ $errors->first('latitude') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.jalan.fields.latitude_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('latitude') ? 'has-error' : '' }}">
                <label for="longtitude">{{ trans('global.jalan.fields.longtitude') }}</label>
                <input type="text" id="longtitude" name="longtitude" class="form-control" value="{{ old('longtitude', isset($jalan) ? $jalan->longtitude : '') }}" step="0.01">
                @if($errors->has('longtitude'))
                    <p class="help-block">
                        {{ $errors->first('longtitude') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.jalan.fields.longtitude_helper') }}
                </p>
            </div>
            
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
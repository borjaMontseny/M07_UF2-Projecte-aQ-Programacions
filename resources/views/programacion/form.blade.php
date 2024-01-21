<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Mòdul') }}
            <select class="form-control" id="modul_id" name="modul_id">
                @foreach ($moduls as $modul)
                    <option value="{{ $modul->id }}" {{ ( $modul->id == $programacion->modul_id) ? 'selected' : '' }}> {{ $modul->name }} </option>
                @endforeach
            </select>
            {!! $errors->first('ra_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('any') }}
            {{ Form::text('any', $programacion->any, ['class' => 'form-control' . ($errors->has('any') ? ' is-invalid' : ''), 'placeholder' => 'Any']) }}
            {!! $errors->first('any', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $programacion->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
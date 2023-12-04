<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Resultat d\'Aprenentatge') }}
            <select class="form-control" id="ra_id" name="ra_id">
                @foreach ($ras as $ra)
                    <option value="{{ $ra->id }}" {{ ( $ra->id == $contingut->ra_id) ? 'selected' : '' }}> {{ $ra->name }} </option>
                @endforeach
            </select>
            {!! $errors->first('ra_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('contingut') }}
            {{ Form::text('contingut', $contingut->contingut, ['class' => 'form-control' . ($errors->has('contingut') ? ' is-invalid' : ''), 'placeholder' => 'Contingut']) }}
            {!! $errors->first('contingut', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

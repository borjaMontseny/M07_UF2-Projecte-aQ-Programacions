<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Resultat d\'Aprenentatge') }}
            <select class="form-control" id="ra_id" name="ra_id">
                @foreach ($ras as $ra)
                    <option value="{{ $ra->id }}" {{ ( $ra->id == $criteri->ra_id) ? 'selected' : '' }}> {{ $ra->name }} </option>
                @endforeach
            </select>
            {!! $errors->first('ra_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('criteri') }}
            {{ Form::text('criteri', $criteri->criteri, ['class' => 'form-control' . ($errors->has('criteri') ? ' is-invalid' : ''), 'placeholder' => 'Criteri']) }}
            {!! $errors->first('criteri', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

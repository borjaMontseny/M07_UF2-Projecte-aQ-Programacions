<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Unitat Formativa') }}
            <select class="form-control" id="uf_id" name="uf_id">
                @foreach ($ufs as $uf)
                    <option value="{{ $uf->id }}" {{ ( $uf->id == $ra->uf_id) ? 'selected' : '' }}> {{ $uf->name }} </option>
                @endforeach
            </select>
            {!! $errors->first('uf_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('Nom') }}
            {{ Form::text('name', $ra->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nom']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
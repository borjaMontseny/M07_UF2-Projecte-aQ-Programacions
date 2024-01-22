<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Títol') }}
            {{ Form::text('Títol de l\'activitat', $activitat->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripció') }}
            {{ Form::text('Descripció de l\'activitat', $activitat->descripcio, ['class' => 'form-control' . ($errors->has('descripcio') ? ' is-invalid' : ''), 'placeholder' => 'Descripcio']) }}
            {!! $errors->first('descripcio', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <!-- Agrega el campo de selección para Modul -->
        <div class="form-group">
            {{ Form::label('modul_id', 'Modul') }}
            {{ Form::select('modul_id', $moduls->pluck('name', 'id'), $activitat->modul_id, ['class' => 'form-control', 'placeholder' => 'Selecciona un Modul', 'id' => 'modulSelect']) }}
            {!! $errors->first('modul_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <!-- Agrega el campo de selección para UF -->
        <div class="form-group">
            {{ Form::label('uf_id', 'Unitat Formativa') }}
            {{ Form::select('uf_id', [], $activitat->uf_id, ['class' => 'form-control', 'placeholder' => 'Selecciona una UF', 'id' => 'ufSelect']) }}
            {!! $errors->first('uf_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <!-- Agrega el campo de selección para RA -->
        <div class="form-group">
            {{ Form::label('ra_id', 'Resultat d\'Aprenentatge') }}
            {{ Form::select('ra_id', [], $activitat->ra_id, ['class' => 'form-control', 'placeholder' => 'Selecciona una RA', 'id' => 'raSelect']) }}
            {!! $errors->first('ra_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <!-- Agrega el campo de selección para Criteri -->
        <div class="form-group">
            {{ Form::label('criteri_id', 'Criteri') }}
            {{ Form::select('criteri_id', [], $activitat->criteri_id, ['class' => 'form-control', 'placeholder' => 'Selecciona un Criteri']) }}
            {!! $errors->first('criteri_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <!-- Agrega el campo de selección para Contingut -->
        <div class="form-group">
            {{ Form::label('contingut_id', 'Contingut') }}
            {{ Form::select('contingut_id', [], $activitat->contingut_id, ['class' => 'form-control', 'placeholder' => 'Selecciona un Contingut']) }}
            {!! $errors->first('contingut_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Crear') }}</button>
    </div>
</div>

<script>
    // Utilizamos JavaScript para manejar la lógica de los selects
    $(document).ready(function () {
        $('#modulSelect').change(function () {
            var modulId = $(this).val();

            console.log('Modul seleccionado:', modulId);

            // Realizar una solicitud AJAX para obtener las UFs relacionadas con el Modul seleccionado
            $.ajax({
                url: '/obtener-ufs/' + modulId,
                type: 'GET',
                success: function (data) {
                    console.log('Respuesta del servidor (UFs):', data);

                    // Actualizar las opciones del select de UF
                    $('#ufSelect').html(data);

                    // Limpiar los selects de RA, Criteri y Contingut al cambiar el Modul
                    $('#raSelect').empty();
                    $('#criteriSelect').empty();
                    $('#contingutSelect').empty();
                },
                error: function (error) {
                    console.error('Error al obtener UFs:', error);
                }
            });
        });

        $('#ufSelect').change(function () {
            var ufId = $(this).val();

            console.log('UF seleccionada:', ufId);

            // Realizar una solicitud AJAX para obtener las RAs relacionadas con la UF seleccionada
            $.ajax({
                url: '/obtener-ras/' + ufId,
                type: 'GET',
                success: function (data) {
                    console.log('Respuesta del servidor (RAs):', data);

                    // Actualizar las opciones del select de RA
                    $('#raSelect').html(data);

                    // Limpiar los selects de Criteri y Contingut al cambiar la UF
                    $('#criteriSelect').empty();
                    $('#contingutSelect').empty();
                },
                error: function (error) {
                    console.error('Error al obtener RAs:', error);
                }
            });
        });

        $('#raSelect').change(function () {
            var raId = $(this).val();

            console.log('RA seleccionada:', raId);

            // Realizar una solicitud AJAX para obtener los Criteris relacionados con la RA seleccionada
            $.ajax({
                url: '/obtener-criteris/' + raId,
                type: 'GET',
                success: function (data) {
                    console.log('Respuesta del servidor (Criteris):', data);

                    // Actualizar las opciones del select de Criteri
                    $('#criteriSelect').html(data);

                    // Limpiar el select de Contingut al cambiar la RA
                    $('#contingutSelect').empty();
                },
                error: function (error) {
                    console.error('Error al obtener Criteris:', error);
                }
            });
        });

        $('#criteriSelect').change(function () {
            var criteriId = $(this).val();

            console.log('Criteri seleccionado:', criteriId);

            // Realizar una solicitud AJAX para obtener los Continguts relacionados con el Criteri seleccionado
            $.ajax({
                url: '/obtener-continguts/' + criteriId,
                type: 'GET',
                success: function (data) {
                    console.log('Respuesta del servidor (Continguts):', data);

                    // Actualizar las opciones del select de Contingut
                    $('#contingutSelect').html(data);
                },
                error: function (error) {
                    console.error('Error al obtener Continguts:', error);
                }
            });
        });
    });
</script>

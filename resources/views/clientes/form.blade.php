<div class="form-group {{ $errors->has('codigo_usuario') ? 'has-error' : ''}}">
    <label for="codigo_usuario" class="control-label">{{ 'Codigo Usuario' }}</label>
    <input class="form-control" name="codigo_usuario" type="number" id="codigo_usuario" value="{{ $cliente->codigo_usuario or ''}}" >
    {!! $errors->first('codigo_usuario', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('primer_nombre') ? 'has-error' : ''}}">
    <label for="primer_nombre" class="control-label">{{ 'Primer Nombre' }}</label>
    <input class="form-control" name="primer_nombre" type="text" id="primer_nombre" value="{{ $cliente->primer_nombre or ''}}" required>
    {!! $errors->first('primer_nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('segundo_nombre') ? 'has-error' : ''}}">
    <label for="segundo_nombre" class="control-label">{{ 'Segundo Nombre' }}</label>
    <input class="form-control" name="segundo_nombre" type="text" id="segundo_nombre" value="{{ $cliente->segundo_nombre or ''}}" required>
    {!! $errors->first('segundo_nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('primer_apellido') ? 'has-error' : ''}}">
    <label for="primer_apellido" class="control-label">{{ 'Primer Apellido' }}</label>
    <input class="form-control" name="primer_apellido" type="text" id="primer_apellido" value="{{ $cliente->primer_apellido or ''}}" required>
    {!! $errors->first('primer_apellido', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('segundo_apellido') ? 'has-error' : ''}}">
    <label for="segundo_apellido" class="control-label">{{ 'Segundo Apellido' }}</label>
    <input class="form-control" name="segundo_apellido" type="text" id="segundo_apellido" value="{{ $cliente->segundo_apellido or ''}}" required>
    {!! $errors->first('segundo_apellido', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Guardar' }}">
</div>

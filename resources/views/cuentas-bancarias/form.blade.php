<div class="form-group {{ $errors->has('numero_cuenta') ? 'has-error' : ''}}">
    <label for="numero_cuenta" class="control-label">{{ 'Numero Cuenta' }}</label>
    <input class="form-control" name="numero_cuenta" type="number" id="numero_cuenta" value="{{ $cuentasbancaria->numero_cuenta or ''}}" required>
    {!! $errors->first('numero_cuenta', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('codigo_usuario') ? 'has-error' : ''}}">
    <label for="codigo_usuario" class="control-label">{{ 'Codigo Usuario' }}</label>
    <select name="codigo_usuario" class="form-control" id="codigo_usuario" required {{ ($formMode === 'edit')? 'disabled' : ''}}>
        @foreach ($clientes as $item)
            <option value="{{ $item->id }}" {{ (isset($cuentasbancaria->codigo_usuario) && $item->codigo_usuario == $cuentasbancaria->codigo_usuario) ? 'selected' : ''}}>{{ $item->codigo_usuario }} - {{ $item->primer_nombre }} {{ $item->primer_apellido }}</option>
        @endforeach
    </select>
    {!! $errors->first('codigo_usuario', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tipo_cuenta') ? 'has-error' : ''}}">
    <label for="tipo_cuenta" class="control-label">{{ 'Tipo Cuenta' }}</label>
    <select name="tipo_cuenta" class="form-control" id="tipo_cuenta" required>
    @foreach (json_decode('{"A01":"Cuenta monetaria","B01":"Cuenta de ahorros","C01":"Cuenta de cheques"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($cuentasbancaria->tipo_cuenta) && $cuentasbancaria->tipo_cuenta == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('tipo_cuenta', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('monto_cuenta') ? 'has-error' : ''}}">
    <label for="monto_cuenta" class="control-label">{{ 'Monto Cuenta' }}</label>
    <input class="form-control" name="monto_cuenta" type="number" id="monto_cuenta" value="{{ $cuentasbancaria->monto_cuenta or ''}}" required>
    {!! $errors->first('monto_cuenta', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Guardar' }}">
</div>

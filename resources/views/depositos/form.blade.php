<div class="form-group {{ $errors->has('numero_cuenta') ? 'has-error' : ''}}">
    <label for="primer_nombre" class="control-label">Numero de cuenta</label>
    <select name="numero_cuenta" class="form-control" id="numero_cuenta" required>
        @foreach ($cuentasBancarias as $item)
            <option value="{{ $item->id }}">{{ $item->numero_cuenta }} - {{ $item->cliente->primer_nombre }} {{ $item->cliente->primer_apellido }}</option>
        @endforeach
    </select>
    {!! $errors->first('numero_cuenta', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('monto_transaccion') ? 'has-error' : ''}}">
    <label for="monto_transaccion" class="control-label">Monto del depósito</label>
    <input class="form-control" name="monto_transaccion" type="number" id="monto_transaccion" required min="1">
    {!! $errors->first('monto_transaccion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('comentarios_transaccion') ? 'has-error' : ''}}">
    <label for="comentarios_transaccion" class="control-label">Comentarios</label>
    <textarea class="form-control" name="comentarios_transaccion" id="comentarios_transaccion" rows="3">
    </textarea>
    {!! $errors->first('comentarios_transaccion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sucursal_transaccion') ? 'has-error' : ''}}">
    <label for="sucursal_transaccion" class="control-label">Sucursal</label>
    <input class="form-control" name="sucursal_transaccion" type="text" id="sucursal_transaccion" required>
    {!! $errors->first('sucursal_transaccion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="Generar depósito">
</div>

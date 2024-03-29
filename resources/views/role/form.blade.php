<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('rol') }}
            {{ Form::select('rol', ['usuario' => 'Usuario', 'administrador' => 'Administrador', 'invitado' => 'Invitado'], $role->rol, ['class' => 'form-control' . ($errors->has('rol') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un rol']) }}
            {!! $errors->first('rol', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

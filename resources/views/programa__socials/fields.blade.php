<!-- Nome Programa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome_programa', 'Nome Programa:') !!}
    {!! Form::text('nome_programa', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('programaSocials.index') }}" class="btn btn-default">Cancel</a>
</div>

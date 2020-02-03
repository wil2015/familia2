<!-- Familia Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('familia_id', 'Familia Id:') !!}
    {!! Form::number('familia_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Sexo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sexo', 'Sexo:') !!}
    {!! Form::text('sexo', null, ['class' => 'form-control']) !!}
</div>

<!-- Data Nascimento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_nascimento', 'Data Nascimento:') !!}
    {!! Form::date('data_nascimento', null, ['class' => 'form-control','id'=>'data_nascimento']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#ssdata_nascimento').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Naturalidade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('naturalidade', 'Naturalidade:') !!}
    {!! Form::text('naturalidade', null, ['class' => 'form-control']) !!}
</div>

<!-- Cpf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cpf', 'Cpf:') !!}
    {!! Form::text('cpf', null, ['class' => 'form-control']) !!}
</div>

<!-- Rg Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rg', 'Rg:') !!}
    {!! Form::text('rg', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Civil Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_civil', 'Estado Civil:') !!}
    {!! Form::text('estado_civil', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('pessoas.index') }}" class="btn btn-default">Cancel</a>
</div>

<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('estado', 'Estado:') !!}
    <p>{{ $familia->estado }}</p>
</div>

<!-- Cidade Field -->
<div class="form-group">
    {!! Form::label('cidade', 'Cidade:') !!}
    <p>{{ $familia->cidade }}</p>
</div>

<!-- Bairro Field -->
<div class="form-group">
    {!! Form::label('bairro', 'Bairro:') !!}
    <p>{{ $familia->bairro }}</p>
</div>

<!-- Cep Field -->
<div class="form-group">
    {!! Form::label('cep', 'Cep:') !!}
    <p>{{ $familia->cep }}</p>
</div>

<!-- Logradouro Field -->
<div class="form-group">
    {!! Form::label('logradouro', 'Logradouro:') !!}
    <p>{{ $familia->logradouro }}</p>
</div>

<!-- Num Logradouro Field -->
<div class="form-group">
    {!! Form::label('num_logradouro', 'Num Logradouro:') !!}
    <p>{{ $familia->num_logradouro }}</p>
</div>

<!-- Id Programa Field -->
<div class="form-group">
    {!! Form::label('id_programa', 'Id Programa:') !!}
    <p>{{ $familia->id_programa }}</p>
    <p>{{ $familia->nome_programa }} </p>
</div>


<div class="table-responsive">
    <table class="table" id="pessoas-table">
        <thead>
            <tr>
                <th>Familia Id</th>
        <th>Nome</th>
        <th>Sexo</th>
        <th>Data Nascimento</th>
        <th>Naturalidade</th>
        <th>Cpf</th>
        <th>Rg</th>
        <th>Estado Civil</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pessoas as $pessoa)
            <tr>
                <td>{{ $pessoa->familia_id }}</td>
            <td>{{ $pessoa->nome }}</td>
            <td>{{ $pessoa->sexo }}</td>
            <td>{{ $pessoa->data_nascimento }}</td>
            <td>{{ $pessoa->naturalidade }}</td>
            <td>{{ $pessoa->cpf }}</td>
            <td>{{ $pessoa->rg }}</td>
            <td>{{ $pessoa->estado_civil }}</td>
                <td>
                    {!! Form::open(['route' => ['pessoas.destroy', $pessoa->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('pessoas.show', [$pessoa->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('pessoas.edit', [$pessoa->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

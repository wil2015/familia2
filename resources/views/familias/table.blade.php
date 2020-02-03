<div class="table-responsive">
        <div class="form-group col-sm-6">

    <input id="myInput" type="text" placeholder="Search..">
        {!! Form::open(['route' => 'familia.pesquisa']) !!}
        </div> 
    <div class="form-group col-sm-6">
        {!! Form::label('id_familia', 'Familia:') !!}
        {!! Form::select('id_familia', $id_familia, ['class' => 'form-control']) !!}
         {!! Form::submit('Pesquisa', ['class' => 'btn btn-primary']) !!}
    </div>  

        {!! Form::close() !!} 

<br><br>

    <table class="table" id="familias-table">
        <thead>
            <tr>
                <th>Estado</th>
        <th>Cidade</th>
        <th>Bairro</th>
        <th>Cep</th>
        <th>Logradouro</th>
        <th>Num Logradouro</th>
        <th>Programa</th>
        <th>Pessoas da Familias</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody id="myTable">
        @foreach($familias as $familia)
            <tr>
            <td>{{ $familia->estado }}</td>
            <td>{{ $familia->cidade }}</td>
            <td>{{ $familia->bairro }}</td>
            <td>{{ $familia->cep }}</td>
            <td>{{ $familia->logradouro }}</td>
            <td>{{ $familia->num_logradouro }}</td>
            <td>{{ $familia->nome_programa }}</td>
            <td>
                <p>
                    @foreach($pessoas_da_familia as $pessoa)
                         @if($pessoa -> familia_id == $familia->id)
                  
                            {{ $pessoa -> nome}} <br/>
                    
                        @endif
                    @endforeach 
                </p>
            </td>
                <td>
                    {!! Form::open(['route' => ['familias.destroy', $familia->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('familias.show', [$familia->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('familias.edit', [$familia->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
         
            </tr>
        
        @endforeach

        </tbody>
    </table>
</div>
@section('scripts')

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

@endsection
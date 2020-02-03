<div class="table-responsive">
    <h3 align="center">        
        Pessoas Sem Familia Associada
        </h3>
    <table class="table searchTable" id="pessoas-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Nome</th>
     
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pessoas as $pessoa)
            <tr>
                <td><input style="border:none" type="text" name="membro[]" value="{{ $pessoa->id }}"></td>
            <td>{{ $pessoa->nome }}</td>
   
                <td>
                   <button type="buttom" class="selectProperty">Adiciona</td>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<br>

<div class="table-responsive" id="pessoas-table2">
<h3 align="center">        
        Associando pessoa a Familia
        </h3>



    <table id="table" class="table selectedPropsTable"> 
          <thead>
            <tr>
                <th>Id</th>
        <th>Nome</th>
     
                <th colspan="3">Action</th>
            </tr>
        </thead>
      <tbody>
       
       </tbody>
    </table>

</div>

@section('scripts')
    <script type="text/javascript">
       $(function(){
  $("table").on('click', ".selectProperty, .selectedProperty", function() { 
    if($(this).hasClass('selectProperty'))
      var newTd= 'selectedProperty', newTbl='selectedPropsTable';
    else
      var newTd= 'selectProperty', newTbl='searchTable'; 
    $(this).prop('checked', false).attr('class', newTd);
    var tr = $(this).closest('tr');
    tr.find(".selectedProperty").text("Remove");
    tr.find(".selectProperty").text("Adiciona");

    $('table.'+newTbl).find("tbody").append(tr.clone()); 
    tr.remove(); 
  });
});

function submit() {
  //Store HTML Table Values into Multidimensional Javascript Array Object
  var TableData = new Array();
  var caralho = new Array();
  $('#table tr').each(function(row, tr) {
    TableData[row] = {
//      "sample1": $(tr).find('td:eq(0)').text()
            "id": $(tr).find('td:eq(0)').text()

    }//tableData[row]

  });
  //TableData.shift(); // first row will be empty - so remove
  console.log(TableData);

  var Data;
  Data = JSON.stringify(TableData);

alert(Data);
  $.ajax({
    type: "POST",
    url: "/inseri",
    dataType:'json',
    contentType: 'json',
    data: { Data }
  
    
  });
}
    </script>
@endsection
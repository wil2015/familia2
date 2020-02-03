@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Familia
        </h1>
   </section>
   <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#familia">Familia</a></li>
        <li><a data-toggle="tab" href="#pessoa">Pessoa</a></li>
    </ul>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div id='familia' class="tab-pane fade in  active">
         <div class="box box-primary">
             <div class="box-body">
                 <div class="row">
                     {!! Form::model($familia, ['route' => ['familias.update', $familia->id], 'method' => 'patch']) !!}

                          @include('familias.fields')

           {{--          {!! Form::close() !!}  --}}
                 </div>
             </div>
         </div>
      </div>
       <div id='pessoa' class="tab-pane fade">
            @include('adminlte-templates::common.errors')
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row">
                       
                              @include('pessoas.table_resumo')
                        
                         {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

   </div>
@endsection
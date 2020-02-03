@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Programa  Social
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($programaSocial, ['route' => ['programaSocials.update', $programaSocial->id], 'method' => 'patch']) !!}

                        @include('programa__socials.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
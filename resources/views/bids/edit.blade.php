@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Editar puja
        </h1>
   </section>
   <div class="content">
       @include('flash::message')
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($bid, ['route' => ['bids.update', $bid->id], 'method' => 'patch']) !!}

                        @include('bids.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

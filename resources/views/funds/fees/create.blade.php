@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Crear comosión por venta de acciones
        </h1>
    </section>
    <div class="content">

        @include('adminlte-templates::common.errors')
        @component('components.box')
            {!! Form::open(['url' => route('funds.fees.store', $fund)]) !!}
                @include('funds.fees.fields')
            {!! Form::close() !!}
        @endcomponent
    </div>
@endsection

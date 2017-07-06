@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Vehicle
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'vehicles.store']) !!}
                        <div class="form-group col-sm-6">
                            {!! Form::label('fund_id', 'Fund:') !!}
                            {!! Form::select('fund_id', $funds, null, ['class' => 'form-control']) !!}
                        </div>
                        @include('vehicles.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

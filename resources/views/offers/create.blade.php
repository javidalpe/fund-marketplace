@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Offer
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'offers.store']) !!}

                        <div class="form-group col-sm-6">
                            {!! Form::label('vehicle_id', 'Vehicle:') !!}
                            {!! Form::select('vehicle_id', $vehicles, null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-sm-6">
                            {!! Form::label('user_id', 'Investor:') !!}
                            {!! Form::select('user_id', $investors, null, ['class' => 'form-control']) !!}
                        </div>

                        @include('offers.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

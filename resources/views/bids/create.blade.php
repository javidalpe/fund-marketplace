@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bid
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'bids.store']) !!}

                        <div class="form-group col-sm-6">
                            {!! Form::label('offer_id', 'Offer:') !!}
                            {!! Form::select('offer_id', $offers, null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-sm-6">
                            {!! Form::label('user_id', 'Investor:') !!}
                            {!! Form::select('user_id', $investors, null, ['class' => 'form-control']) !!}
                        </div>


                        @include('bids.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

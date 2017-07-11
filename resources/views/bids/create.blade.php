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

                        @if (!Request::has('offer'))
                            <div class="form-group col-sm-6">
                                {!! Form::label('offer_id', 'Offer:') !!}
                                {!! Form::select('offer_id', $offers, null, ['class' => 'form-control']) !!}
                            </div>
                        @else
                            <div class="col-sm-12">
                                <label>Se ofrece:</label>
                                <div class="alert alert-info">
                                    @include('offers.banner')
                                </div>
                            </div>

                            {!! Form::hidden('offer_id', Request::get('offer')) !!}
                        @endif

                        @if (Auth::user()->isManager())
                            <div class="form-group col-sm-6">
                                {!! Form::label('user_id', 'Investor:') !!}
                                {!! Form::select('user_id', $investors, null, ['class' => 'form-control']) !!}
                            </div>
                        @else
                            {!! Form::hidden('user_id', Auth::user()->id) !!}
                        @endif

                        @include('bids.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

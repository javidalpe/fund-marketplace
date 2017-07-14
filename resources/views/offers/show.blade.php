@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Oferta de venta de acciones de {!! $vehicle->company !!}
        </h1>
    </section>
    <div class="content">
        @if(count($bids) > 0)
            @component('components.box')
                @slot('title')
                    Pujas
                @endslot
                @include('bids.table')
            @endcomponent
        @endif

        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('offers.show_fields')
                    @can('bid', $offer)
                        <a href="{!! route('bids.create', ['offer' => $offer->id]) !!}" class="btn btn-primary">Pujar por estas acciones</a>
                    @endcan
                    <a href="{!! route('offers.index') !!}" class="btn btn-default">Atrás</a>
                </div>
            </div>
        </div>

        @can('view', $offer)
            @component('components.box')
                @slot('title')
                    Resumen de operación para {{ $position['amount'] }} acciones a @money($position['stock_price']) por acción
                @endslot
                @include('vehicles.position')

            @endcomponent
            @component('components.box')
                @slot('title')
                    Desglose final
                @endslot
                @include('offers.resume')
            @endcomponent
        @endcan
    </div>
@endsection

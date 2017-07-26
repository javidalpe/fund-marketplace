@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Oferta de venta de acciones de {!! $vehicle->company !!}
        </h1>
    </section>
    <div class="content">

        @component('components.box')
            @slot('title')
                Pujas
            @endslot
            @if(count($bids) > 0)
                @include('bids.table')
            @else
                Nadie ha pujado por esta oferta
            @endif
        @endcomponent

        @component('components.box')
            @slot('title')
                Datos generales de la oferta
            @endslot
            @include('offers.show_fields')
            @can('bid', $offer)
                <a href="{!! route('bids.create', ['offer' => $offer->id]) !!}" class="btn btn-primary">Pujar por estas acciones</a>
            @endcan
            <a href="{!! route('offers.index') !!}" class="btn btn-default">Atrás</a>
        @endcomponent

        @can('view', $offer)
            @component('components.box')
                @slot('title')
                    Cálculo de venta de {{ $position['amount'] }} acciones a @money($position['stock_price']) por acción
                @endslot
                @include('vehicles.position')

            @endcomponent
            @component('components.box')
                @slot('title')
                    Desglose final de la operación
                @endslot
                @include('offers.resume')
            @endcomponent
        @endcan
    </div>
@endsection

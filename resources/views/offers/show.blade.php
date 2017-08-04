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
                Pujas para comprar estas acciones
            @endslot
            @if(count($bids) > 0)
                @include('bids.table')
            @else
                Ningún inversor ha pujado por esta oferta de acciones
            @endif
        @endcomponent

        @can('view', $offer)
            @component('components.box')
                @slot('title')
                    Posición sobre las pujas
                @endslot
                @forelse ($finalBids as $key => $bid)
                    Cálculo de venta de {{ $bid['position']['amount'] }} acciones a @money($bid['position']['stock_price']) por acción
                    @include('vehicles.position', ['position' => $bid['position']])
                    Desglose final de la operación
                    @include('offers.resume', ['resume' => $bid['resume']])
                @empty
                    Nadie ha pujado por esta oferta
                @endforelse
            @endcomponent
        @endcan

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

    </div>
@endsection

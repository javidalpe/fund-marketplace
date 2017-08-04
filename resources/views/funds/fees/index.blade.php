@component('components.box')
    @slot('title')
        Comisiones de venta
    @endslot
    @include('funds.fees.table')
    <a href="{{route('funds.fees.create', $fund->id)}}" class="btn btn-primary">Añadir comisión de venta</a>
@endcomponent

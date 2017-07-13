@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Ofertas del Marketplace</h1>
        @can('create', App\Models\Offer::class)
            <h1 class="pull-right">
               <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('offers.create') !!}">Publicar oferta de venta de acciones</a>
            </h1>
        @endcan
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('offers.table')
            </div>
        </div>
    </div>
@endsection

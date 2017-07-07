@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Vehicles</h1>

        @can('create', App\Models\Vehicle::class)
            <h1 class="pull-right">
               <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('vehicles.create') !!}">Add New</a>
            </h1>
        @endcan
        
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('vehicles.table')
            </div>
        </div>
    </div>
@endsection

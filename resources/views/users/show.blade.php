@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Investor
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('users.show_fields')
                    <a href="{!! route('users.index') !!}" class="btn btn-default">Atrás</a>
                </div>
            </div>
        </div>

        <h4>Clubes</h4>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('funds.table')
                </div>
            </div>
        </div>

        <h4>Vehículos</h4>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('vehicles.table')
                </div>
            </div>
        </div>

        <h4>Operaciones</h4>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('operations.table')
                </div>
            </div>
        </div>


    </div>
@endsection

@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Fund
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('funds.show_fields')
                    <a href="{!! route('funds.index') !!}" class="btn btn-default">Atrás</a>
                </div>
            </div>
        </div>

        @include('funds.users.index')
        @include('funds.fees.index')
    </div>
@endsection

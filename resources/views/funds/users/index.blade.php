
    <h4 class="">Inversores miembros del club</h4>

    <div class="box box-primary">
        <div class="box-body">

            @can('update', $fund)
                {!! Form::open(['url' => route('funds.users.store', $fund)]) !!}

                    @include('funds.users.fields')

                {!! Form::close() !!}
            @endcan

            @include('funds.users.table')
        </div>
    </div>

<li class="{{ Request::is('funds*') ? 'active' : '' }}">
    <a href="{!! route('funds.index') !!}"><i class="fa fa-building-o"></i><span>Clubs</span></a>
</li>

<li class="{{ Request::is('vehicles*') ? 'active' : '' }}">
    <a href="{!! route('vehicles.index') !!}"><i class="fa fa-star"></i><span>Participadas</span></a>
</li>

<li class="{{ Request::is('operations*') ? 'active' : '' }}">
    <a href="{!! route('operations.index') !!}"><i class="fa fa-percent"></i><span>Operaciones</span></a>
</li>

<li class="{{ Request::is('offers*') ? 'active' : '' }}">
    <a href="{!! route('offers.index') !!}"><i class="fa fa-newspaper-o"></i><span>Marketplace</span></a>
</li>

<li class="{{ Request::is('bids*') ? 'active' : '' }}">
    <a href="{!! route('bids.index') !!}"><i class="fa fa-money"></i><span>Pujas</span></a>
</li>

@can('create', App\User::class)
    <li class="{{ Request::is('users*') ? 'active' : '' }}">
        <a href="{!! route('users.index') !!}"><i class="fa fa-users"></i><span>Investors</span></a>
    </li>
@endcan

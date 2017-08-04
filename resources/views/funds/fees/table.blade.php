<table class="table table-responsive" id="fees-table">
    <thead>
        <th>Desde rent.</th>
        <th>Hasta rent.</th>
        <th>Porcentaje com.</th>
        <th>Mínimo</th>
        <th colspan="3">Gestionar</th>
    </thead>
    <tbody>
    @foreach($fees as $fee)
        <tr>
            <td>@percentage($fee->from)</td>
            <td>@if($fee->to)
                    @percentage($fee->to)
                @else
                    &infin;
                @endif
            </td>
            <td>@percentage($fee->percentage)</td>
            <td>@money($fee->min)</td>
            <td>

                {!! Form::open(['route' => ['funds.fees.destroy', $fund, $fee], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Estás seguro de querer borrarlo?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

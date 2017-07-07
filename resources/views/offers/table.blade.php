<table class="table table-responsive" id="offers-table">
    <thead>
        <th>Amount</th>
        <th>Stock Price</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($offers as $offer)
        <tr>
            <td>{!! $offer->amount !!}</td>
            <td>@money($offer->stock_price)</td>
            <td>
                {!! Form::open(['route' => ['offers.destroy', $offer->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('offers.show', [$offer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('offers.edit', [$offer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
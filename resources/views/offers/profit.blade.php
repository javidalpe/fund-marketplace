@component('components.box-danger')
    @slot('title')
        Benefinicios gestor
    @endslot
    <table class="table table-bordered table-striped table-condensed table-responsive" id="resume-table">
        <tbody>
            <tr>
                <td>Comisión de venta</td>
                <td align="right">@money($resume['exit_fee'])</td>
            </tr>
            <tr>
                <td>Comisión de compra</td>
                <td align="right">@money($resume['buy_fee'])</td>
            </tr>

            <tr>
                <td>Gastos de notaría</td>
                <td align="right">-@money($resume['notaryFee'])</td>
            </tr>
            <tr>
                <td>Gastos de gestoría</td>
                <td align="right">-@money($resume['managementFee'])</td>
            </tr>

            <tfoot>
                <tr>
                    <th>Beneficio total</th>
                    <th style="text-align:right">@money($resume['total_profit'])</th>
                </tr>
            </tfoot>
    </table>
@endcomponent

<table class="table table-responsive" id="resume-table">
    <tbody>
        <tr>
            <td>Precio de venta</td>
            <td>@money($resume['amount'])</td>
        </tr>
        <tr>
            <td>Comisión de venta (17%)</td>
            <td>-@money($resume['fee'])</td>
        </tr>

        <tr>
            <td>IVA (21%)</td>
            <td>-@money($resume['vat'])</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th>Total a percibir</th>
            <th>@money($resume['total_amount'])</th>
        </tr>
    </tfoot>
</table>

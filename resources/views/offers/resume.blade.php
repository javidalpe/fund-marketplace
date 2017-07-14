<div class="row">
    <div class="col-md-6">
        <p>Comisión de venta</p>
        <table class="table table-bordered table-striped table-condensed table-responsive" id="resume-table">
            <tbody>
                <tr>
                    <td>Precio de venta</td>
                    <td align="right">@money($resume['amount'])</td>
                </tr>
                <tr>
                    <td>Precio de compra</td>
                    <td align="right">-@money($resume['total_buy_price'])</td>
                </tr>

                <tr>
                    <td>Beneficio</td>
                    <td align="right">@money($resume['profit'])</td>
                </tr>
                <tr>
                    <td>Comisión de venta (17%)</td>
                    <td align="right">@money($resume['fee'])</td>
                </tr>

                <tr>
                    <td>IVA (21%)</td>
                    <td align="right">@money($resume['vat'])</td>
                </tr>
                <tfoot>
                    <tr>
                        <th>Comisión total</th>
                        <th style="text-align:right">@money($resume['fee'] + $resume['vat'])</th>
                    </tr>
                </tfoot>
        </table>
    </div>
    <div class="col-md-6">
        <p>A recibir</p>
        <table class="table table-bordered table-striped table-condensed table-responsive" id="resume-table">
            <tbody>
                <tr>
                    <td>Precio de venta</td>
                    <td align="right">@money($resume['amount'])</td>
                </tr>
                <tr>
                    <td>Comisión de venta</td>
                    <td align="right">-@money($resume['fee'] + $resume['vat'])</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>Total a percibir</th>
                    <th style="text-align:right">@money($resume['total_amount'])</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

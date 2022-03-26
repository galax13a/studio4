
@if($this->obj_factura)

<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="3">
                <table>
                    <tr style="float: right;">
                        <td class="title">
                           <h6>Recibo Cobro</h6>
                        </td>
                        <td>
                           <b class="btn btn-success"> Factura #: {{ $this->obj_factura["paystudio"]["num"]}} </b> <br />
                           <h6> Nit #: {{ $this->obj_factura["empresa"]["nit"]}} </h6> <br />
                            Creado: {{Date("Y-m-d H:i:s")}}<br />
                           Elaborado : {{$this->obj_factura["date"]}}
                            <br>
                            # Dian : {{ $this->obj_factura["empresa"]["nfactory"]}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="3">
                <table>
                    <tr>
                        <td>
                            <h4>Monetizacion/Cobrar a</h4>
                            <b>{{ $this->obj_factura["monetizadore"]["contact"]}}</b><br />
                            NIT.:  {{ $this->obj_factura["monetizadore"]["nit"]}}<br />
                            info :{{ $this->obj_factura["monetizadore"]["pagina"]}}
                        </td>

                        <td>
                            <b>Pagar a nombre de </b>  <br>
                            {{ $this->obj_factura["empresa"]["name"]}} <br />
                            cc : {{ $this->obj_factura["empresa"]["data1"]}}<br />
                            Celular : {{ $this->obj_factura["empresa"]["tel"]}} <br>
                            Dir : Carrera 30 #86-13
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>Metodo de Pago</td>
            <td>N# Cuenta</td>
            <td>Tipo Cuenta</td>
        </tr>

        <tr class="details">
            <td>{{ $this->obj_factura["medios"]["name"]}} </td>
            <td>{{ $this->obj_factura["medios"]["account"]}}</td>
            <td> Ahorros</td>
        </tr>

        <tr class="heading">
            <td>Valor en Letras</td>
            <td>Valor #</td>
            <td>Moneda</td>
        </tr>

        <tr class="details">
            <td>
             
             La Suma de {{$this->obj_factura["payout"]}} / {{$this->formato_moneda}}
            </td>
            <td>1.000</td>
            <td>{{$this->obj_factura["payout"]}} USD

        <tr class="heading">
            <td>Descripcion</td>
            <td>Cant</td>
            <td>Precio/Total</td>
        </tr>

        <tr class="item">
            <td>{{ $this->obj_factura["name"] }}</td>
            <td>1</td>
            <td>${{$this->obj_factura["payout"]}} / <b> Total({{$this->obj_factura["payout"]}}) </b></td>
        </tr>
        <tr class="total">
            <td></td>
            <td>
                <br> <b class="btn btn-primary"> Total Factura: ${{$this->obj_factura["payout"]}}  </b> </td>
        </tr>
    </table>
</div>
@else 
<b>esperando factu</b>
@endif
<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid rgb(26, 243, 243);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
       
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
      
        border-top: 0px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .invoice-box.rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .invoice-box.rtl table {
        text-align: right;
    }

    .invoice-box.rtl table tr td:nth-child(2) {
        text-align: left;
    }
</style>


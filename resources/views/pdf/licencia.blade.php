<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th,
        td {
            text-align: left;
            padding: 3px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        .logo {
            position: absolute;
            left: 250px;
            width: 200px;
            height: 50px;
        }

        .titulo {
            text-transform: uppercase;
        }

        .fuentes {
            font-family: 'Mulish', sans-serif;
        }

        .padre {
            background-color: rgb(254, 254, 254);
            margin: 1rem;
            padding: 1rem;
            border: 2px solid #ccc;
            /* IMPORTANTE */
            text-align: center;
        }

        table,
        td,
        th {
            border: none;
            font-size: 90%;
            background-color: rgb(254, 254, 254);
            font-weight: normal;
        }

        td {
            background-color: white;
        }

        div>.info {
            font-size: 12px;
        }

        .sugerencia {
            position: absolute;
            right: 508px;
            font-weight: bold;
        }

        .sugerencia-dosis-porciones > p{
            position: absolute;
            top: 730px;
            left: 40px;
            font-size: 15px;
        }

        .dato_general {
            position: absolute;
            left: 35px;
        }

        .dato_consulta {
            position: absolute;
            left: 35px;
        }

        .purple-letter {
            color: rgb(239, 44, 36);
        }

        .green-letter {
            font-weight: bold;
            color: black;
        }

        div > strong {
            font-family: Monospace;
        }

    </style>
</head>

<body>
    <div class="padre">
        <img class="logo" src="{{ public_path('assets/welcome/assets/img/masivo_logo.png') }}" alt="logo">
        <br><br><br>
        <div class="info green-letter">Av. Platino No. 173, Fraccionamiento, Valle Dorado, Col. Rosario Poniente</div>
        <div class="info green-letter">Código postal: 29014.</div>
        <div class="info green-letter">Tuxtla Gutiérrez, Chiapas</div>
        <br>
        <p>Exportado {{ now()->isoFormat('LLLL');}}</p>
        <br>
        <div style="overflow-x:auto;">
            {{-- <h4 class="dato_general purple-letter">DATOS DE LA ADQUISICIÓN</h4> --}}
            <h4 class="">DATOS DE LA ADQUISICIÓN</h4>
            <table class="bordesFuera">
                @foreach ($licencia_data as $licencia)
                <tr>
                    <th><strong class="green-letter">Folio: </strong> {{$licencia->folio}}.</th>
                </tr>
                <tr>
                    <th><strong class="green-letter">Nombre: </strong> {{$licencia->nombre}}.</th>
                </tr>
                <tr>
                    <th><strong class="green-letter">Correo electrónico: </strong> {{$licencia->correo}}.</th>
                </tr>
                <tr>
                    <th><strong class="green-letter">Teléfono: </strong> {{$licencia->telefono}}.</th>
                </tr>
                <tr>
                    <th><strong class="green-letter">Licencia: </strong> {{$licencia->licencia}}.</th>
                </tr>
                <tr>
                    <th><strong class="green-letter">Cantidad: </strong> {{$licencia->cantidad}}.</th>
                </tr>
                <tr>
                    <th><strong class="green-letter">Subtotal: </strong>$ {{$licencia->subtotal}}.</th>
                </tr>
                <tr>
                    <th><strong class="green-letter">IVA: </strong>$ {{$licencia->iva}}.</th>
                </tr>
                <tr>
                    <th><strong class="green-letter">Total: </strong>$ {{$licencia->total}}.</th>
                </tr>
            </table>
            @endforeach

            <h4 class="">DATOS BANCARIOS</h4>
            <table>
                <tr>
                    <th><strong class="green-letter">NOMBRE: </strong>AMBAR ROJO STUDIOS SA DE CV</th>
                </tr>
                <tr>
                    <th><strong class="green-letter">BANCO: </strong>Banorte</th>
                </tr>
                <tr>
                    <th><strong class="green-letter">No. CUENTA: </strong>1055526387</th>
                </tr>
                <tr>
                    <th><strong class="green-letter">CLABE: </strong> 072 100 01055526387 0</th>
                </tr>
            </table>
            <div style="text-align: center">
                <p><strong>Una vez realizado tu pago envía el comprobante de pago con tu FOLIO y adjuntando los datos de adquisición al siguiente correo electrónico "ventas@masivoxml.com".</strong></p>
            </div>
            <br>
            <div>
                <div class=""><strong class="purple-letter">MASVIO XML</strong>-<strong class="green-letter"> - DESCARGAS MASIVAS</strong></div>
            </div>
        </div>
    </div>
</body>

</html>

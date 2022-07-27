<html>

<head>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Helvetica;
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid whitesmoke;
            border-bottom: 1px solid whitesmoke;
            color: whitesmoke;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background-color: #bba31b;
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;
            ;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }

        .container {
            padding: 10px;
        }
    </style>
</head>

<body>
    <header class="clearfix container">
        <div id="logo">
            <img src="https://i.imgur.com/bub7YYa.png">
        </div>
        <h1>NOTA</h1>

        <div id="project">
            <div><span>CONCEPTO</span>NOTA DE AGENDA</div>
            <div><span>CLIENTE</span> {{ $nota->name_customer }} </div>
            <div><span>DIRECCIÓN</span> {{ $nota->address_work_customer }} </div>
            <div><span>CEDULA</span> V-{{ $nota->cedula_customer }} </div>

        </div>
    </header>
    <main class="container">
        <table>
            <thead>
                <tr>
                    <th class="service">NRO. PRESTAMO</th>
                    <th class="service">MONTO</th>
                    <th class="service">MONTO POR PAGAR</th>
                    <th class="service">MONTO PAGADO</th>
                    <th>TASA DE INTERES</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="service">{{ $nota->id }}</td>
                    <td class="service">{{ $nota->amount_loan }}</td>
                    <td class="service">{{ $nota->amount_rest_loan }}</td>
                    <td class="service">{{ $nota->amount_loan - $nota->amount_rest_loan }}</td>
                    <td class="qty">{{ $nota->interest_rate_loan }}%</td>
                </tr>
            </tbody>
        </table>
        <div>
            <div style="display: flex !important">
                <strong>DETALLES DE LA NOTA: </strong>
                <p>{{ $nota->note }}</p>
            </div>
            <div style="display: flex !important"><strong>TIPO DE NOTA:</strong>
                <p> @switch($nota->type_note)
                        @case('1')
                            Precaucion
                        @break

                        @case('2')
                            Urgente
                        @break

                        @case('3')
                            Riesgo
                        @break

                        @default
                    @endswitch
                </p>
            </div>
        </div>
        <div id="notices">
            <div>
                <div>Inversiones el arte del oro</div>
                <div>San Critóbal, Centro Carrera 9 - Calle 7 local 6-26,<br /> Táchira 5001, VE</div>
                <div>(0276) 3421958</div>
                <div><a href="mailto:inversioneselartedeloro@gmail.com">inversioneselartedeloro@gmail.com</a></div>
            </div>
        </div>
    </main>
    <footer>
        Inversiones el arte del oro - San Critóbal, Centro Carrera 9 - Calle 7 local 6-26
    </footer>
</body>

</html>

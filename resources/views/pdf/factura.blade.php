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
  border-top: 1px solid  whitesmoke;
  border-bottom: 1px solid  whitesmoke;
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
  border-top: 1px solid #5D6975;;
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
.container{
  padding: 10px;
}
    </style>
</head>
<body>
    <header class="clearfix container">
        <div id="logo">
          <img src="https://i.imgur.com/bub7YYa.png">
        </div>
        <h1>FACTURA</h1>

        <div id="project">
          <div><span>CONCEPTO</span>FACTURA DE PAGO</div>
          <div><span>CLIENTE</span> {{$pago->name_customer}} </div>
          <div><span>DIRECCIÓN</span> {{$pago->address_work_customer}} </div>
          <div><span>CEDULA</span> V-{{$pago->cedula_customer}} </div>

    </div>
      </header>
      <main class="container">
        <table>
          <thead>
            <tr>
              <th class="service">NRO. PRESTAMO</th>
              <th class="desc">SERIAL DE PAGO</th>
              <th>MONTO</th>
              <th>TASA DE INTERES</th>
              <th>FECHA DE PAGO</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="service">{{$pago->id}}</td>
              <td class="desc">{{$pago->serial_payment}}</td>
              <td class="unit">{{$pago->amount_payment-(($pago->amount_payment*$pago->interest_rate_loan)/100)}}$</td>
              <td class="qty">{{$pago->interest_rate_loan}}%</td>
              <td class="total">{{$pago->date_payment}}</td>
            </tr>
            <tr>
              <td colspan="4">INTERES DEL {{$pago->interest_rate_loan}}%</td>
              <td class="total">{{($pago->amount_payment*$pago->interest_rate_loan)/100}}$</td>
            </tr>
            <tr>
              <td colspan="4" class="grand total">TOTAL</td>
              <td class="grand total">{{$pago->amount_payment}}$</td>
            </tr>
          </tbody>
        </table>
        <div id="notices">
            <div>
                <div>Inversiones el arte del oro</div>
                <div>San Critóbal, Centro Carrera 9 - Calle 7 local 6-26,<br /> Táchira 5001, VE</div>
                <div>(0276) 3421958</div>
                <div><a href="mailto:company@example.com">inversioneselartedeloro@gmail.com</a></div>
              </div>
        </div>
      </main>
      <footer>
        Inversiones el arte del oro - San Critóbal, Centro Carrera 9 - Calle 7 local 6-26
      </footer>
</body>
</html>

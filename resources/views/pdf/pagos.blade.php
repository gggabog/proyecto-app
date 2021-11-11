<html>
<head>
    <style>

        @page {
            margin: 0cm 0cm;
            font-family: Helvetica;
        }

        body {
            margin: 10px;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #bba31b;
            color: white;
            text-align: center;
            line-height: 30px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #bba31b;
            color: white;
            text-align: center;
            line-height: 35px;
        }
        body {
        color: #343a40;
        line-height: 1;
        display: flex;
        justify-content: center;
      }

      table {
        margin-left: 7px;
        border-right-color: #ffffff;
        margin-top: 100px;
        font-size: 18px;
        /* /* border: 1px solid #343a40; */
        border-collapse: collapse;
      }

      th, td {
        /* border: 1px solid #343a40; */
        padding: 16px 24px;
        text-align: left;
      }

      th {
        background-color: #bba31b;
        color: #fff;
        width: 25%;
      }

      tbody tr:nth-child(odd){
        background-color: #f8f9fa;
      }


      tbody tr:nth-child(even){
        background-color: #e9ecef;
      }
      .main{
        justify-content: center;
        }

    </style>
</head>
<body>
<header>
    <h1>PAGOS DE LOS ULTIMOS 30 DIAS</h1>
</header>

<main class="main">
     <table>
      <thead>
        <tr>
          <th>Cliente</th>
          <th >Nro.Prestamo</th>
          <th>Serial del pago</th>
          <th style="width: 15px;">Monto</th>
          <th>Fecha</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($pagos as $pago)
            <tr>
                <td> {{$pago->name_customer}} </td>
                <td> {{$pago->id}} </td>
                <td> {{$pago->serial_payment}} </td>
                <td> {{$pago->amount_payment}} </td>
                <td> {{$pago->date_payment}} </td>
            </tr>
        @endforeach
      </tbody>
    </table>
</main>

<footer>
    <h1>INVERSIONES EL ARTE DEL ORO</h1>
</footer>
</body>
</html>

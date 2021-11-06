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
        width: 800px;
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
    </style>
</head>
<body>
<header>
    <h1>PRESTAMOS DE LOS ULTIMOS 30 DIAS</h1>
</header>

<main >
     <table>
      <thead>
        <tr>
          <th>Cliente</th>
          <th>Nro.Prestamo</th>
          <th>Monto</th>
          <th>Tasa de interes</th>
          <th>Fecha</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($prestamos as $prestamo)
            <tr>
                <td> {{$prestamo->name_customer}} </td>
                <td> {{$prestamo->id}} </td>
                <td> {{$prestamo->amount_loan}} </td>
                <td> {{$prestamo->interest_rate_loan}}%</td>
                <td> {{$prestamo->date_start_loan}} </td>
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

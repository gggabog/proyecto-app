<?php

namespace App\Http\Controllers;

use App\Models\Loans;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDFLastLoans()
    {
        $datos = DB::table('loans')
            ->where('date_start_loan', '>=', now()->subDays(30))
            ->where('register_status_db_loan', '=', 0)
            ->join('customers', 'customers.id', '=', 'loans.fk_id_cliente' )
            ->select('customers.name_customer','loans.id', 'loans.amount_loan', 'loans.interest_rate_loan', 'loans.date_start_loan')
            ->get();
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'prestamos' => $datos
        ];

        $pdf = PDF::loadView('pdf/test', $data);

        return $pdf->download('UltimosPrestamos.pdf');
    }

    public function generatePDFLastPayments()
    {
        $datos = DB::table('payments')
            ->where('date_payment', '>=', now()->subDays(30))
            ->where('register_status_db_payment', '=', 0)
            ->join('loans', 'loans.id', '=', 'payments.fk_id_loan' )
            ->join('customers', 'customers.id', '=', 'loans.fk_id_cliente' )
            ->select('customers.name_customer','loans.id','payments.serial_payment','payments.amount_payment','payments.date_payment')
            ->get();
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'pagos' => $datos
        ];

        $pdf = PDF::loadView('pdf/pagos', $data);

        return $pdf->download('UltimosPagos.pdf');
    }

    public function generateInvoice($id)
    {
        $datos = DB::table('payments')
            ->where('payments.id',$id)
            ->where('date_payment', '>=', now()->subDays(30))
            ->where('register_status_db_payment', '=', 0)
            ->join('loans', 'loans.id', '=', 'payments.fk_id_loan' )
            ->join('customers', 'customers.id', '=', 'loans.fk_id_cliente' )
            ->select('customers.name_customer',
                     'customers.address_work_customer',
                     'customers.cedula_customer',
                     'loans.id',
                     'loans.interest_rate_loan',
                     'payments.serial_payment',
                     'payments.amount_payment',
                     'payments.date_payment')
            ->first();
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'pago' => $datos
        ];

        $pdf = PDF::loadView('pdf/factura', $data);

        return $pdf->download('factura.pdf');
    }
}

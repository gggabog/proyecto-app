<?php
namespace App\Http\Controllers;

use Alert;
use App\Models\CashOrder;
use App\Models\Customers;
use App\Models\Diary;
use App\Models\Loans;
use App\Models\Payments;
use App\Models\User;
use Artisan;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan as FacadesArtisan;
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Log;
use Spatie\Backup\Helpers\Format;
use Storage;
use ZipArchive;

class RespaldoController extends Controller
{
    public function clientes()
    {
   $fileName = 'clientes.csv';
   $customers = Customers::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('id', 
        'name_customer',
        'cedula_customer',
        'address_work_customer', 
        'address_home_customer', 
        'extra_address_customer',
        'cellphone_customer',
        'extra_cellphone_customer',
        'register_status_db_customer',
        'created_at',
        'updated_at');

        $callback = function() use($customers, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($customers as $customer) {
                $row['id'] = $customer->id;
                $row['name_customer']  = $customer->name_customer;
                $row['cedula_customer']    = $customer->cedula_customer;
                $row['address_work_customer']    = $customer->address_work_customer;
                $row['address_home_customer']  = $customer->address_home_customer;
                $row['extra_address_customer']  = $customer->extra_address_customer;
                $row['extra_address_customer'] = $customer->extra_address_customer;
                $row['cellphone_customer'] = $customer->cellphone_customer;
                $row['extra_cellphone_customer'] = $customer->extra_cellphone_customer;
                $row['register_status_db_customer'] = $customer->register_status_db_customer;
                $row['created_at'] = $customer->created_at;
                $row['updated_at'] = $customer->updated_at;

                fputcsv($file, array($row['id'],
                $row['name_customer'],
                $row['cedula_customer'],
                $row['address_work_customer'],
                $row['address_home_customer'],
                $row['extra_address_customer'],
                $row['extra_address_customer'],
                $row['cellphone_customer'],
                $row['extra_cellphone_customer'],
                $row['register_status_db_customer'],
                $row['created_at'],
                $row['updated_at']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function pedidos()
    {
   $fileName = 'pedidos.csv';
   $cashorders = CashOrder::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('id', 
        'fk_customer_id',
        'amount_cash_order',
        'status_cash_order', 
        'register_status_db_cashOrder', 
        'created_at',
        'updated_at',
        );

        $callback = function() use($cashorders, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($cashorders as $cashorder) {
                $row['id']  = $cashorder->id;
                $row['fk_customer_id']    = $cashorder->fk_customer_id;
                $row['amount_cash_order']    = $cashorder->amount_cash_order;
                $row['status_cash_order']  = $cashorder->status_cash_order;
                $row['register_status_db_cashOrder']  = $cashorder->register_status_db_cashOrder;
                $row['created_at'] = $cashorder->created_at;
                $row['updated_at'] = $cashorder->updated_at;

                fputcsv($file, array($row['id'],
                $row['fk_customer_id'],
                $row['amount_cash_order'],
                $row['status_cash_order'],
                $row['register_status_db_cashOrder'],
                $row['created_at'],
                $row['updated_at'],));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function prestamos()
    {
   $fileName = 'prestamos.csv';
   $loans = Loans::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('id', 
        'fk_id_cliente',    
        'fk_id_cashOrder',
        'status_loan',
        'amount_loan', 
        'amount_rest_loan', 
        'debt_loan',  
        'date_start_loan',  
        'date_pay_loan',  
        'interest_rate_loan', 
        'register_status_db_loan',  
        'created_at',
        'updated_at');

        $callback = function() use($loans, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($loans as $loan) {
                $row['id']  = $loan->id;
                $row['fk_id_cliente']    = $loan->fk_id_cliente;
                $row['fk_id_cashOrder']    = $loan->fk_id_cashOrder;
                $row['status_loan']  = $loan->status_loan;
                $row['amount_loan']  = $loan->amount_loan;
                $row['amount_rest_loan']  = $loan->amount_rest_loan;
                $row['debt_loan']  = $loan->debt_loan;
                $row['date_start_loan']  = $loan->date_start_loan;
                $row['date_pay_loan']  = $loan->date_pay_loan;
                $row['interest_rate_loan']  = $loan->interest_rate_loan;
                $row['register_status_db_loan']  = $loan->register_status_db_loan;
                $row['created_at']  = $loan->created_at;
                $row['updated_at']  = $loan->updated_at;
                

                fputcsv($file, array($row['id'], 
                $row['fk_id_cliente'],    
                $row['fk_id_cashOrder'],
                $row['status_loan'],
                $row['amount_loan'], 
                $row['amount_rest_loan'], 
                $row['debt_loan'],  
                $row['date_start_loan'],  
                $row['date_pay_loan'],  
                $row['interest_rate_loan'], 
                $row['register_status_db_loan'],  
                $row['created_at'],
                $row['updated_at'],));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function pagos()
    {
   $fileName = 'pagos.csv';
   $payments = Payments::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('id',
        'fk_id_loan',
        'amount_payment',
        'date_payment',
        'serial_payment',
        'register_status_db_payment',
        'created_at',
        'updated_at');

        $callback = function() use($payments, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($payments as $payment) {
                $row['id']  = $payment->id;
                $row['fk_id_loan']    = $payment->fk_id_loan;
                $row['amount_payment']    = $payment->amount_payment;
                $row['date_payment']  = $payment->date_payment;
                $row['serial_payment']  = $payment->serial_payment;
                $row['register_status_db_payment']    = $payment->register_status_db_payment;
                $row['created_at']  = $payment->created_at;
                $row['updated_at']  = $payment->updated_at;

                fputcsv($file, array($row['id'],
                $row['fk_id_loan'],
                $row['amount_payment'],
                $row['date_payment'],
                $row['serial_payment'],
                $row['register_status_db_payment'],
                $row['created_at'],
                $row['updated_at'],));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function agenda()
    {
   $fileName = 'agenda.csv';
   $notes = Diary::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('id',
        'id_fk_customer',
        'id_fk_loan',
        'note',
        'type_note',
        'register_status_db_diary',
        'created_at',
        'updated_at');

        $callback = function() use($notes, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($notes as $note) {
                $row['id']  = $note->id;
                $row['id_fk_customer']    = $note->id_fk_customer;
                $row['id_fk_loan']    = $note->id_fk_loan;
                $row['note']  = $note->note;
                $row['type_note']  = $note->type_note;
                $row['register_status_db_diary']    = $note->register_status_db_diary;
                $row['created_at']  = $note->created_at;
                $row['updated_at']  = $note->updated_at;

                fputcsv($file, array($row['id'],
                $row['id_fk_customer'],
                $row['id_fk_loan'],
                $row['note'],
                $row['type_note'],
                $row['register_status_db_diary'],
                $row['created_at'],
                $row['updated_at'],));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function usuarios()
    {
   $fileName = 'usuarios.csv';
   $users = User::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('id',
        'name',
        'email',
        'level',
        'email_verified_at',
        'password',
        'remember_token',
        'created_at',
        'updated_at');

        $callback = function() use($users, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($users as $user) {
                $row['id']  = $user->id;
                $row['name']    = $user->name;
                $row['email']    = $user->email;
                $row['level']  = $user->level;
                $row['email_verified_at']  = $user->email_verified_at;
                $row['password']    = $user->password;
                $row['remember_token']    = $user->remember_token;
                $row['created_at']  = $user->created_at;
                $row['updated_at']  = $user->updated_at;

                fputcsv($file, array($row['id'],
                $row['name'],
                $row['email'],
                $row['level'],
                $row['email_verified_at'],
                $row['password'],
                $row['remember_token'],
                $row['created_at'],
                $row['updated_at']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}


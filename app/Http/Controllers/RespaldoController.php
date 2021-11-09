<?php
namespace App\Http\Controllers;

use Alert;
use App\Models\Customers;
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
    public function exportCsv()
    {
   $fileName = 'tasks.csv';
   $customers = Customers::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Title', 'Assign', 'Description', 'Start Date', 'Due Date');

        $callback = function() use($customers, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($customers as $customer) {
                $row['name_customer']  = $customer->name_customer;
                $row['cedula_customer']    = $customer->cedula_customer;
                $row['address_work_customer']    = $customer->address_work_customer;
                $row['address_home_customer']  = $customer->address_home_customer;
                $row['extra_address_customer']  = $customer->extra_address_customer;

                fputcsv($file, array($row['name_customer'], $row['cedula_customer'], $row['address_work_customer'], $row['address_home_customer'], $row['extra_address_customer']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}


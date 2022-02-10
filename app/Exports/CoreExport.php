<?php

namespace App\Exports;

use App\Models\Core;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DB;


class CoreExport implements FromQuery, WithHeadings, ShouldAutoSize
{
    use Exportable;
    public function __construct(string $start_date, string $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function headings(): array
    {
        return [
            // 'Sl',
            'Customer Name',
            'Chassis',
            'Engine',
            'Sale Date',
            'Address',
            'Mobile',
            'Model',
            '1st Service',
            '2nd Service',
            '3rd Service',
            '4th Service',
            '1st Paid',
            '2nd Paid',
            '3rd Paid',
            '4th Paid',

        ];
    }

    public function query()
    {
        $service_data = Core::query()
            ->rightJoin('vehicles', 'vehicles.model_code', '=', 'cores.model_code')
            ->select(
                'cores.customer_name',
                'cores.five_chassis',
                'cores.five_engine',
                DB::raw('DATE_FORMAT(cores.original_sale_date, "%d.%m.%Y") as original_sale_date'),
                // 'cores.original_sale_date',
                'cores.full_address',
                'cores.mobile',
                'vehicles.model',
            )
            ->selectRaw('DATE_FORMAT(DATE_ADD(cores.original_sale_date, INTERVAL 1 MONTH), "%d.%m.%Y") as first_service')
            ->selectRaw('DATE_FORMAT(DATE_ADD(cores.original_sale_date, INTERVAL 3 MONTH), "%d.%m.%Y") as second_service')
            ->selectRaw('DATE_FORMAT(DATE_ADD(cores.original_sale_date, INTERVAL 6 MONTH), "%d.%m.%Y") as third_service')
            ->selectRaw('DATE_FORMAT(DATE_ADD(cores.original_sale_date, INTERVAL 9 MONTH), "%d.%m.%Y") as fourth_service')
            ->selectRaw('DATE_FORMAT(DATE_ADD(cores.original_sale_date, INTERVAL 12 MONTH), "%d.%m.%Y") as first_paid')
            ->selectRaw('DATE_FORMAT(DATE_ADD(cores.original_sale_date, INTERVAL 15 MONTH), "%d.%m.%Y") as second_paid')
            ->selectRaw('DATE_FORMAT(DATE_ADD(cores.original_sale_date, INTERVAL 18 MONTH), "%d.%m.%Y") as third_paid')
            ->selectRaw('DATE_FORMAT(DATE_ADD(cores.original_sale_date, INTERVAL 21 MONTH), "%d.%m.%Y") as fourth_paid')
            ->whereBetween('cores.original_sale_date', [$this->start_date, $this->end_date])
            ->orderBy('cores.original_sale_date', 'asc');

        return $service_data;
    }
}

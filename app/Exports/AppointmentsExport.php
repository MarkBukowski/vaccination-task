<?php

namespace App\Exports;

use App\Models\Appointment;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AppointmentsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithCustomCsvSettings
{

    public $date;

    public function __construct($date)
    {
        $this->date = $date;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function map($appointment): array
    {
        return [
            $appointment->name,
            $appointment->last_name,
            $appointment->email,
            $appointment->phone,
            $appointment->national_id,
            $appointment->date,
            $appointment->time,
        ];
    }

    public function headings(): array
    {
        return [
            "Name",
            "Surname",
            "Email",
            "Phone",
            "National ID",
            "Date",
            "Time",
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Appointment::whereDate('date', $this->date)->orderBy('time')->get();
    }
}

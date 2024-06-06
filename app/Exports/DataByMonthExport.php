<?php

namespace App\Exports;

use App\SLoc;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataByMonthExport implements FromCollection, WithHeadings
{
    protected $bulan;

    public function __construct($bulan)
    {
        $this->bulan = $bulan;
    }

    public function collection()
    {
        return SLoc::where('bulan', $this->bulan)->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Bulan',
            'Weekly',
            'Update Data',
            'Site',
            'Site Name',
            'Article',
            'Article Name',
            'Sloc',
            'Qty',
            'Penyebab / Jenis Sloc',
            'Follow Up Sloc (1003)',
            'Detail Follow Up Sloc',
            'TP Sloc',
            'PIC TP',
            'Receipt / LPPBDO / NoSR',
            'Qty Solving',
            'Evident',
            'Tgl Solving / Progress',
            'Aging Sloc',
            'Aging Solve',
            'Status Sloc',
        ];
    }
}
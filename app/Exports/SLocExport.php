<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\SLoc;
use DB;

class SLocExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	
        return SLoc::all();
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

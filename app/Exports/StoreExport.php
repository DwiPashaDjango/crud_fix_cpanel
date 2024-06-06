<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Store;
use DB;

class StoreExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	
        return Store::all();
    }

    public function headings(): array
    {
    return [
    'NO',
    'BU',
    'BU LEGACY',
    'SITE',
    'SITE NAME',
    'KOTA',
    'LUASAN M2',
    'STATUS',
    'OPENING',
    'CLOSING',
    'ALAMAT',
    'POSTL CO',
    'TERITORIAL',
    'AM',
    'SM 1 / FM 1',
    'SM 2 / FM 2',
    'SM 3 / FM 3',
    'DSM 1',
    'DSM 2',
    'DSM 3',
    'DSM 4',
    'DSM 5',
    'DSM 6',
    'DSM 7',
    'DSM 8',
    'ICO 1',
    'ICO 2',
    'ICO 3',
    'ICO 4',
    'EMAIL MGR',
    'EMAIL ICO',
    'AVAYA CS',
    'AVAYA BO',
    'UPDATE PADA',
];

    }
}

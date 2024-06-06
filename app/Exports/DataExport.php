<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Data;
use DB;

class DataExport implements FromCollection, WithHeadings, ShouldAutoSize
{
   public function collection()
    {
    	
        return Data::all();
    }
    public function headings(): array
    {
    return [
    'Id',
    'Regional',
    'Area',
    'Gedung',
    'Lokasi',
    'Alamat',
    
     
];

    }
}

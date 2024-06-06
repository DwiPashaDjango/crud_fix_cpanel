<?php

namespace App\Imports;

use App\Data;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
HeadingRowFormatter::default('none');

class DataImport implements  ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
     public function model(array $row)
    {
        return new Data([
            'id' => $row['Id'],
            'regional' => $row['Regional'],
            'area' => $row['Area'],
            'gedung' => $row['Gedung'],
            'lokasi' => $row['Lokasi'],
            'alamat' => $row['Alamat'],
            

        ]);
    }
}

<?php

namespace App\Imports;

use App\Store;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
HeadingRowFormatter::default('none');

class StoreImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */



    public function model(array $row)
    {
        return new Store([
            'id' => $row['NO'],
            'bu' => $row['BU'],
            'bu_legacy' => $row['BU LEGACY'],
            'site' => $row['SITE'],
            'site_name' => $row['SITE NAME'],
            'kota' => $row['KOTA'],
            'luas' => $row['LUASAN M2'],
            'status' => $row['STATUS'],
            'opening' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['OPENING']),
            'closing' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['CLOSING']),
            'alamat' => $row['ALAMAT'],
            'postl' => $row['POSTL CO'],
            'teritorial' => $row['TERITORIAL'],
            'am' => $row['AM'],
            'sm1' => $row['SM 1 / FM 1'],
            'sm2' => $row['SM 2 / FM 2'],
            'sm3' => $row['SM 3 / FM 3'],
            'dsm1' => $row['DSM 1'],
            'dsm2' => $row['DSM 2'],
            'dsm3' => $row['DSM 3'],
            'dsm4' => $row['DSM 4'],
            'dsm5' => $row['DSM 5'],
            'dsm6' => $row['DSM 6'],
            'dsm7' => $row['DSM 7'],
            'dsm8' => $row['DSM 8'],
            'ico1' => $row['ICO 1'],
            'ico2' => $row['ICO 2'],
            'ico3' => $row['ICO 3'],
            'ico4' => $row['ICO 4'],
            'email_sm' => $row['EMAIL MGR'],
            'email_ico' => $row['EMAIL ICO'],
            'avayacs' => $row['AVAYA CS'],
            'avayabo' => $row['AVAYA BO'],
            'update_data' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['UPDATE PADA']),
        ]);
    }
}

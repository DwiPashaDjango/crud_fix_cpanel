<?php

namespace App\Imports;

use App\SLoc;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
HeadingRowFormatter::default('none');

class SLocImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */



    public function model(array $row)
    {
        return new SLoc([
            'id' => $row['No'],
            'bulan' => $row['Bulan'],
            'weekly' => $row['Weekly'],
            'update_data' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['Update Data']),
            'site' => $row['Site'],
            'site_name' => $row['Site Name'],
            'article' => $row['Article'],
            'article_name' => $row['Article Name'],
            'sloc' => $row['Sloc'],
            'qty' => $row['Qty'],
            'penyebab_sloc' => $row['Penyebab / Jenis Sloc'],
            'followup_sloc' => $row['Follow Up Sloc (1003)'],
            'detail_followup' => $row['Detail Follow Up Sloc'],
            'tp_sloc' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['TP Sloc']),
            'pic_tp' => $row['PIC TP'],
            'no_dokumen' => $row['Receipt / LPPBDO / NoSR'],
            'qty_solving' => $row['Qty Solving'],
            'evident' => $row['Evident'],
            'tgl_solving' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['Tgl Solving / Progress']),
            'aging_sloc' => $row['Aging Sloc'],
            'aging_solve' => $row['Aging Solve'],
            'status_sloc' => $row['Status Sloc'],
        ]);
    }
}

<?php

namespace App;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class SLoc extends Model
{
    protected $table = "sloc";
    public $timestamps = false;
    protected $fillable	 = ['bulan','weekly','update_data', 'site', 'site_name', 'article', 'article_name', 'sloc', 'qty','penyebab_sloc',
    'followup_sloc','detail_followup','tp_sloc','pic_tp','no_dokumen','qty_solving','evident','tgl_solving',
    'aging_sloc','aging_solve','status_sloc'];
}

<?php

namespace App;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = "stores";
    public $timestamps = false;
    // protected $fillable	 = ['bu', 'bu_legacy', 'site', 'site_name', 'kota', 'luas', 'status','opening','closing','alamat','postl','teritorial','am','sm1','sm2','sm3','dsm1',
    // 'dsm2','dsm3','dsm4','dsm5','dsm6','dsm7','dsm8','ico1','ico2','ico3','ico4','email_sm','email_ico','avayacs','avayabo','update_data'];
    protected $guarded = [];
}

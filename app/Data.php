<?php

namespace App;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Data extends Model
{
    protected $table = "data";
    public $timestamps = false;
    protected $fillable	 = ['regional', 'area', 'gedung', 'lokasi', 'alamat'];

}
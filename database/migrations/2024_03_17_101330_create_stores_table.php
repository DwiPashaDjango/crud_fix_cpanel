<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->text('bu');
            $table->text('bu_legacy');
            $table->text('site');
            $table->text('site_name');
            $table->text('kota');
            $table->decimal('luas');
            $table->text('status');
            $table->date('opening');
            $table->date('closing');
            $table->text('alamat');
            $table->text('postl');
            $table->text('teritorial');
            $table->text('am');
            $table->text('sm1');
            $table->text('sm2');
            $table->text('sm3');
            $table->text('dsm1');
            $table->text('dsm2');
            $table->text('dsm3');
            $table->text('dsm4');
            $table->text('dsm5');
            $table->text('dsm6');
            $table->text('dsm7');
            $table->text('dsm8');
            $table->text('ico1');
            $table->text('ico2');
            $table->text('ico3');
            $table->text('ico4');
            $table->text('email_sm');
            $table->text('email_ico');
            $table->text('avayacs');
            $table->text('avayabo');
            $table->date('update_data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}

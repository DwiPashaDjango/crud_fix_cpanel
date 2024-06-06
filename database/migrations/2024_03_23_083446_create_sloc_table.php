<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sloc', function (Blueprint $table) {
            $table->id();
            $table->text('bulan');
            $table->text('weekly');
            $table->date('update_data');
            $table->text('site');
            $table->text('site_name');
            $table->text('article');
            $table->text('article_name');
            $table->text('sloc');
            $table->integer('qty');
            $table->text('penyebab_sloc');
            $table->text('followup_sloc');
            $table->text('detail_followup');
            $table->date('tp_sloc');
            $table->text('pic_tp');
            $table->text('no_dokumen');
            $table->integer('qty_solving');
            $table->string('evident')->nullable();
            $table->date('tgl_solving');
            $table->integer('aging_sloc');
            $table->integer('aging_solve');
            $table->text('status_sloc');
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
        Schema::dropIfExists('sloc');
    }
}

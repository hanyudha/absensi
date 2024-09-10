<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('absensis', function (Blueprint $table) {
        $table->id('AbsensiID');
        $table->unsignedBigInteger('UserID');
        $table->string('Hari');
        $table->date('Tanggal');
        $table->time('WaktuMasuk')->nullable();
        $table->time('WaktuKeluar')->nullable();
        $table->string('Keterangan')->nullable();
        $table->timestamps();
    });
}
    
        public function down()
        {
            Schema::dropIfExists('absensis');
        }
    }
    
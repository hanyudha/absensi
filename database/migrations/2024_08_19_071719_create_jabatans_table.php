<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJabatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
        {
            Schema::create('jabatans', function (Blueprint $table) {
                $table->bigIncrements('JabatanID');
                $table->string('NamaJabatan');
                $table->string('Keterangan');
                $table->unsignedBigInteger('DepartemenID'); 
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
            Schema::dropIfExists('jabatans');
        }
}

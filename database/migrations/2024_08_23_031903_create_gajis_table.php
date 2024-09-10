<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateGajisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   Schema::create('gajis', function (Blueprint $table) {
        $table->bigIncrements('GajiID');
        $table->unsignedBigInteger('UserID');
        $table->string('No_Rekening');
        $table->string('Npwp');
        $table->decimal('Nominal');
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
        Schema::dropIfExists('gajis');
    }
}

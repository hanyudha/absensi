<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('UserID');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('JabatanID');
            $table->date('Tanggal_Lahir');
            $table->enum('Jenis_Kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('No_Telp');
            $table->text('Alamat');
            $table->date('Tanggal_Bergabung');
            $table->enum('Status', ['Aktif', 'Tidak Aktif']);
            $table->enum('role_as', ['admin', 'user']);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

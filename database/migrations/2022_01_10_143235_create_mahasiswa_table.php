<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->increments('mhs_id');
            $table->string('mhs_npm');
            $table->string('mhs_nama');
            $table->enum('mhs_jk', ['Laki-laki', 'Perempuan']);
            $table->integer('mhs_prodi_id');
            $table->string('mhs_foto_1');
            $table->string('mhs_foto_2');
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
        Schema::dropIfExists('mahasiswas');
    }
}

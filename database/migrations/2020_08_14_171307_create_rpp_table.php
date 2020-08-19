<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpp', function (Blueprint $table) {
            $table->id();
            $table->string('nip_guru'); // Guru Yang Upload File RPP
            $table->string('nama_rpp', 100);
            $table->string('rpp'); // nama uniq untuk disimpan distorage aplikasi
            $table->float('nilai')->nullable();
            $table->enum('status', ['belum', 0, 1]);
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
        Schema::dropIfExists('rpp');
    }
}

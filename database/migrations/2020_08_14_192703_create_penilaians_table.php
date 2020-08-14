<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // RPP YANG SUDAH DINILAI DAN MEMINTA PERSETUJUAN
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('rpp_id');
            $table->string('nip_supervisor');
            $table->string('nilai');
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
        Schema::dropIfExists('penilaians');
    }
}

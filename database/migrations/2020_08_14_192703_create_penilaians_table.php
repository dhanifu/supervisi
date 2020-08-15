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
        // RPP YANG SUDAH DINILAI DAN MEMINTA PERSETUJUAN KE KURIKULUM
        // SAAT MEMINTA PERSETUJUAN DI TOMBOLNYA, ITU AKAN MENGINPUT KE TABLE `penilaians` dan
        // MAKA AKAN MENGINPUT RPP_ID yang DIMINTA PERSETUJUAN KE TABLE `persetujuans`
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('rpp_id'); // RPP punya guru yang mana
            $table->string('nip_supervisor'); // nip supervisor yang menilai
            $table->float('nilai')->nullable(); // <75 otomatis tidak disetujui kurikulum
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

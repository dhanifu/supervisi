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
            $table->string('nama_rpp');
            $table->string('nip_supervisor');
            $table->string('nip_kurikulum');
            $table->float('nilai')->nullable();
            $table->boolean('status')->nullable()->default(false); // ditentukan oleh kurikulum, disetujui/tidak
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

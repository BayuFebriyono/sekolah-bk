<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekaman_tata_tertib', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guru_id');
            $table->foreignId('tata_tertib_id');
            $table->foreignId('siswa_id');
            $table->integer('no_pelanggaran');
            $table->string('tahun_pelajaran', 14);
            $table->date('tanggal');
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
        Schema::dropIfExists('rekaman_tata_tertib');
    }
};

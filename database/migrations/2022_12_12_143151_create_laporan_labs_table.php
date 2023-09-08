<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_lab', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_labkomputer');
            $table->foreign('id_labkomputer')->references('id')->on('lab_komputer');
            $table->date('tanggal');
            $table->string('catatan');
            $table->string('keterangan');
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
        Schema::dropIfExists('laporan_labs');
    }
}

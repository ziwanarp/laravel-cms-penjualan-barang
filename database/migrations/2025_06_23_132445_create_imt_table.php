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
        Schema::create('imts', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal_pemeriksaan')->nullable();
            $table->string('usia');
            $table->string('tb');
            $table->string('bb');
            $table->string('jk');
            $table->string('lila')->nullable();
            $table->string('usia_subur')->nullable();
            $table->text('penjelasan')->nullable();
            $table->text('tindakan')->nullable();
            $table->text('rujukan')->nullable();
            $table->text('tanda_umum')->nullable();
            $table->text('rekomendasi_asupan')->nullable();
            $table->text('tindakan_pendukung')->nullable();
            $table->string('imt');
            $table->string('status1')->nullable();
            $table->string('status2')->nullable();
            $table->string('riwayat')->nullable();
            $table->string('catatan')->nullable();
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
        Schema::dropIfExists('imt');
    }
};

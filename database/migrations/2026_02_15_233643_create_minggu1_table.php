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
    Schema::create('minggu1', function (Blueprint $table) {
        $table->id();

        // ===============================
        // A. ANTROPOMETRI
        // ===============================
        $table->decimal('bb', 5, 2); // berat badan
        $table->decimal('tb', 5, 2); // tinggi badan
        $table->decimal('imt', 5, 2)->nullable();

        // ===============================
        // B. POLA MAKAN
        // ===============================
        $table->string('frekuensi_makan')->nullable();
        $table->string('frekuensi_lainnya')->nullable();

        $table->string('gorengan')->nullable();
        $table->string('manis')->nullable();
        $table->string('fastfood')->nullable();

        $table->string('sayur')->nullable();
        $table->string('buah')->nullable();

        $table->string('porsi')->nullable();
        $table->string('porsi_lainnya')->nullable();

        $table->string('waktu_makan_malam')->nullable();
        $table->string('waktu_lainnya')->nullable();

        // ===============================
        // C. AKTIVITAS FISIK
        // ===============================
        $table->string('olahraga')->nullable();

        $table->json('jenis_olahraga')->nullable(); // checkbox array
        $table->string('jenis_lainnya')->nullable();

        $table->string('frekuensi_olahraga')->nullable();
        $table->string('durasi_olahraga')->nullable();

        // ===============================
        // D. POLA HIDUP
        // ===============================
        $table->string('tidur')->nullable();
        $table->string('air')->nullable();
        $table->string('ngemil')->nullable();

        // ===============================
        // E. KELUHAN
        // ===============================
        $table->string('keluhan')->nullable();
        $table->text('catatan')->nullable();

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
        Schema::dropIfExists('minggu1');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('Nama');
            $table->string('NIK');
            $table->enum('Jenis_kelamin', ['Pria', 'Wanita']);
            $table->date('tgl_lahir');
            $table->text('Alamat');
            $table->text('Provinsi');
            $table->text('Kabupaten');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

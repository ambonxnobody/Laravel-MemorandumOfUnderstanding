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
        Schema::create('mo_u_s', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('fileMoU')->nullable();
            // $table->foreignId('kerjasama_id');
            $table->string('denganPihak');
            $table->date('waktuMulai');
            $table->date('waktuSelesai');
            $table->text('textMoU')->nullable();
            $table->enum('status', ['Berlaku', 'Hampir Berakhir', 'Tidak Berlaku']);
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
        Schema::dropIfExists('mo_u_s');
    }
};

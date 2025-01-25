<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->integer('idSurat');
            $table->integer('idAyat');
            $table->primary(['user_id', 'idSurat', 'idAyat']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign(['idSurat', 'idAyat'])->references(['idSurat', 'idAyat'])->on('ayat')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};

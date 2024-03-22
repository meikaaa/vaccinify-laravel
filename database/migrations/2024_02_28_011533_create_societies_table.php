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
        Schema::create('societies', function (Blueprint $table) {
            $table->id();
            $table->string('id_card_number');
            $table->string('password');
            $table->string('name');
            $table->enum('gender', ['male', 'female']);
            $table->date('born');
            $table->unsignedBigInteger('regional_id');
            $table->string('login_tokens');
            $table->foreign('regional_id')->references('id')->on('regionals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('societies');
    }
};

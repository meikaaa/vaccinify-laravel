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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('societies_id');
            $table->unsignedBigInteger('regional_id');
            $table->string('current_symptoms');
            $table->enum('status', ['pending', 'declined', 'accepted']);
            $table->string('notes');
            $table->foreign('societies_id')->references('id')->on('societies')->onDelete('cascade');
            $table->foreign('regional_id')->references('id')->on('regionals')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};

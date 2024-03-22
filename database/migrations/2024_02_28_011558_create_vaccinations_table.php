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
        Schema::create('vaccinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('societies_id');
            $table->unsignedBigInteger('spot_id');
            $table->unsignedBigInteger('regional_id');
            $table->string('dose');
            $table->string('place');
            $table->foreign('societies_id')->references('id')->on('societies')->onDelete('cascade');
            $table->foreign('regional_id')->references('id')->on('regionals')->onDelete('cascade');
            $table->foreign('spot_id')->references('id')->on('spots')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccinations');
    }
};

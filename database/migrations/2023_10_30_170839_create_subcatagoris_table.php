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
        Schema::create('subcatagoris', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('catagori_id');
            $table->string('subcatagori_name')->nullable();
            $table->string('subcatagori_slug')->nullable();
            $table->foreign('catagori_id')->references('id')->on('catagoris')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcatagoris');
    }
};

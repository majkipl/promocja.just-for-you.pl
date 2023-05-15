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
        Schema::create('opinions', function (Blueprint $table) {
            $table->id();

            $table->string('firstname', 128);
            $table->string('lastname', 128);
            $table->string('email', 255);
            $table->unsignedBigInteger('application_id');
            $table->string('url', 1024);
            $table->unsignedBigInteger('free_id');
            $table->text('content');
            $table->boolean('legal_1')->default(true);
            $table->boolean('legal_2')->default(true);
            $table->boolean('legal_3');
            $table->boolean('legal_4');
            $table->foreign('free_id')->references('id')->on('freebies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('application_id')->references('id')->on('applications')->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opinions');
    }
};

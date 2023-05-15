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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 128);
            $table->string('lastname', 128);
            $table->string('address', 255);
            $table->string('city', 64);
            $table->string('zip', 6);
            $table->string('phone', 20);
            $table->string('email', 255);
            $table->string('receipt_number', 128);
            $table->string('img_receipt', 255);
            $table->string('img_ean', 255);
            $table->date('buy_at');
            $table->boolean('legal_1')->default(true);
            $table->boolean('legal_2')->default(true);
            $table->boolean('legal_3');
            $table->boolean('legal_4');
            $table->unsignedBigInteger('voivodeship_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('free_id');
            $table->unsignedBigInteger('where_id');

            $table->foreign('voivodeship_id')->references('id')->on('voivodeships')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('shop_id')->references('id')->on('shops')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('free_id')->references('id')->on('freebies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('where_id')->references('id')->on('wheres')->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};

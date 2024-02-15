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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->string('type');
            $table->string('redeem_id');
            $table->string('tag');
            $table->string('validity')->nullable();
            $table->string('campain_starts');
            $table->string('campain_finishes');
            $table->string('is_active');
            $table->string('importance')->nullable();
            $table->string('target')->nullable();
            $table->string('parameters');
            $table->string('wallet_id');
            $table->string('is_valid_monday')->nullable();
            $table->string('is_valid_tuesday')->nullable();
            $table->string('is_valid_wednesday')->nullable();
            $table->string('is_valid_thursday')->nullable();
            $table->string('is_valid_friday')->nullable();
            $table->string('is_valid_saturday')->nullable();
            $table->string('is_valid_sunday')->nullable();
            $table->string('is_archived')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};

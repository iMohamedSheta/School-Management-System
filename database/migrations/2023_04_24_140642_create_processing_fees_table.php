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
        Schema::create('processing_fees', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->unsignedBigInteger('student_id');
            $table->decimal('amount',8,2)->nullable();
            $table->string('currency_code', 3)->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processing_fees');
    }
};

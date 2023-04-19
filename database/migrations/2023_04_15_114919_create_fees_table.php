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
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->decimal('amount',8,2);
            $table->string('currency_code', 3);
            $table->unsignedBigInteger('feetype_id');
            $table->unsignedBigInteger('grade_id')->nullable();
            $table->unsignedBigInteger('classroom_id')->nullable();
            $table->string('description')->nullable();
            $table->string('year')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};

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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('teacher_name');
            $table->string('teacher_job')->nullable();
            $table->string('phone_teacher')->nullable();
            $table->string('national_id_teacher')->nullable();
            $table->string('passport_id_teacher')->nullable();
            $table->bigInteger('nationality_id')->unsigned()->nullable();
            $table->bigInteger('blood_type_id')->unsigned()->nullable();
            $table->bigInteger('religion_id')->unsigned()->nullable();
            $table->bigInteger('specialization_id')->unsigned()->nullable();
            $table->bigInteger('gender_id')->unsigned();
            $table->date('joining_date');
            $table->text('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};

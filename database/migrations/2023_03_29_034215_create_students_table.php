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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->text('name');
            $table->bigInteger('gender_id')->unsigned();
            $table->bigInteger('nationality_id')->unsigned();
            $table->bigInteger('blood_type_id')->unsigned();
            $table->date('date_birth');
            $table->bigInteger('grade_id')->unsigned();
            $table->bigInteger('classroom_id')->unsigned();
            $table->bigInteger('parent_id')->unsigned();
            $table->bigInteger('religion_id')->unsigned();
            $table->string('academic_year');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

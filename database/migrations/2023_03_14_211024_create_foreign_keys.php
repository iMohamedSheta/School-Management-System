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
        Schema::table('role_user', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });

        Schema::table('grades', function (Blueprint $table) {
            $table->foreign('classroom_id')->references('id')->on('classrooms');
        });

        Schema::table('classrooms', function (Blueprint $table) {
            $table->foreign('grade_id')->references('id')->on('grades');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('set null');
        });

        Schema::table('my_parents', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('Nationality_Father_id')->references('id')->on('nationalities');
            $table->foreign('Blood_Type_Father_id')->references('id')->on('type__bloods');
            $table->foreign('Religion_Father_id')->references('id')->on('religions');
            $table->foreign('Nationality_Mother_id')->references('id')->on('nationalities');
            $table->foreign('Blood_Type_Mother_id')->references('id')->on('type__bloods');
            $table->foreign('Religion_Mother_id')->references('id')->on('religions');

        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('role_user', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::table('grades', function (Blueprint $table) {
            $table->dropForeign(['classroom_id']);
        });

        Schema::table('classrooms', function (Blueprint $table) {
            $table->dropForeign(['grade_id']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['classroom_id']);
        });
        Schema::table('my_parents', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['Nationality_Father_id']);
            $table->dropForeign(['Blood_Type_Father_id']);
            $table->dropForeign(['Religion_Father_id']);
            $table->dropForeign(['Nationality_Mother_id']);
            $table->dropForeign(['Blood_Type_Mother_id']);
            $table->dropForeign(['Religion_Mother_id']);
        });


    }
};

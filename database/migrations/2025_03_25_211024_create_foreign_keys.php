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


        Schema::table('my_parents', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('Nationality_Father_id')->references('id')->on('nationalities');
            $table->foreign('Blood_Type_Father_id')->references('id')->on('type__bloods');
            $table->foreign('Religion_Father_id')->references('id')->on('religions');
            $table->foreign('Nationality_Mother_id')->references('id')->on('nationalities');
            $table->foreign('Blood_Type_Mother_id')->references('id')->on('type__bloods');
            $table->foreign('Religion_Mother_id')->references('id')->on('religions');

        });

        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
        });

        Schema::table('post_upvotes', function (Blueprint $table) {
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('post_downvotes', function (Blueprint $table) {
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('post_comments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });

        Schema::table('teachers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('specialization_id')->references('id')->on('specializations')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('nationality_id')->references('id')->on('nationalities');
            $table->foreign('blood_type_id')->references('id')->on('type__bloods');
            $table->foreign('religion_id')->references('id')->on('religions');
        });
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->foreign('blood_type_id')->references('id')->on('type__bloods')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('my_parents')->onDelete('cascade');
            $table->foreign('religion_id')->references('id')->on('religions');
        });
        Schema::table('promotions', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('from_grade')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('from_classroom')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreign('to_grade')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('to_classroom')->references('id')->on('classrooms')->onDelete('cascade');
        });
        Schema::table('fees', function (Blueprint $table) {
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreign('currency_code')->references('code')->on('currencies')->onDelete('cascade');
            $table->foreign('feetype_id')->references('id')->on('feetypes')->onDelete('cascade');
        });
        Schema::table('fee_invoices', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreign('fee_id')->references('id')->on('fees')->onDelete('cascade');
            $table->foreign('feetype_id')->references('id')->on('feetypes')->onDelete('cascade');
            $table->foreign('currency_code')->references('code')->on('currencies')->onDelete('cascade');
        });
        Schema::table('student_accounts', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('fee_invoice_id')->references('id')->on('fee_invoices')->onDelete('cascade');
            $table->foreign('receipt_id')->references('id')->on('receipt_students')->onDelete('cascade');
            $table->foreign('processing_id')->references('id')->on('processing_fees')->onDelete('cascade');
            $table->foreign('payment_id')->references('id')->on('payment_students')->onDelete('cascade');
            $table->foreign('currency_code')->references('code')->on('currencies')->onDelete('cascade');

        });
        Schema::table('receipt_students', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('currency_code')->references('code')->on('currencies')->onDelete('cascade');
        });
        Schema::table('fund_accounts', function (Blueprint $table) {
            $table->foreign('receipt_id')->references('id')->on('receipt_students')->onDelete('cascade');
            $table->foreign('payment_id')->references('id')->on('payment_students')->onDelete('cascade');
            $table->foreign('currency_code')->references('code')->on('currencies')->onDelete('cascade');
        });
        Schema::table('processing_fees', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('currency_code')->references('code')->on('currencies')->onDelete('cascade');
        });
        Schema::table('payment_students', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('currency_code')->references('code')->on('currencies')->onDelete('cascade');
        });
        Schema::table('attendances', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
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


        Schema::table('my_parents', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['Nationality_Father_id']);
            $table->dropForeign(['Blood_Type_Father_id']);
            $table->dropForeign(['Religion_Father_id']);
            $table->dropForeign(['Nationality_Mother_id']);
            $table->dropForeign(['Blood_Type_Mother_id']);
            $table->dropForeign(['Religion_Mother_id']);
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['grade_id']);
            $table->dropForeign(['classroom_id']);
        });
        Schema::table('post_upvotes', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::table('post_downvotes', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::table('post_comments', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['specialization_id']);
            $table->dropForeign(['gender_id']);
            $table->dropForeign(['nationality_id']);
            $table->dropForeign(['blood_type_id']);
            $table->dropForeign(['religion_id']);
        });
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['gender_id']);
            $table->dropForeign(['nationality_id']);
            $table->dropForeign(['grade_id']);
            $table->dropForeign(['classroom_id']);
            $table->dropForeign(['parent_id']);
            $table->dropForeign(['religion_id']);
        });
        Schema::table('promotions', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['from_grade']);
            $table->dropForeign(['from_classroom']);
            $table->dropForeign(['to_grade']);
            $table->dropForeign(['to_classroom']);
        });
        Schema::table('fees', function (Blueprint $table) {
            $table->dropForeign(['grade_id']);
            $table->dropForeign(['classroom_id']);
            $table->dropForeign(['currency_code']);
            $table->dropForeign(['feetype_id']);
        });
        Schema::table('fee_invoices', function (Blueprint $table) {
            $table->dropForeign(['grade_id']);
            $table->dropForeign(['classroom_id']);
            $table->dropForeign(['currency_code']);
            $table->dropForeign(['fee_id']);
            $table->dropForeign(['feetype_id']);
            $table->dropForeign(['student_id']);
        });
        Schema::table('student_accounts', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['fee_invoice_id']);
            $table->dropForeign(['currency_code']);
            $table->dropForeign(['receipt_id']);
            $table->dropForeign(['processing_id']);
            $table->dropForeign(['payment_id']);
        });
        Schema::table('receipt_students', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['currency_code']);

        });
        Schema::table('fund_accounts', function (Blueprint $table) {
            $table->dropForeign(['receipt_id']);
            $table->dropForeign(['currency_code']);
        });
        Schema::table('processing_fees', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['currency_code']);
        });
        Schema::table('payment_students', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['currency_code']);
        });
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['grade_id']);
            $table->dropForeign(['classroom_id']);
            $table->dropForeign(['teacher_id']);

        });


    }
};

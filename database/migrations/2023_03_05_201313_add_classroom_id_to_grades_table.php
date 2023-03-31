
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClassroomIdToGradesTable extends Migration
{
    public function up()
    {
        Schema::table('grades', function (Blueprint $table) {
            $table->unsignedBigInteger('classroom_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('grades', function (Blueprint $table) {
                $table->dropColumn('classroom_id');
        });
    }
}

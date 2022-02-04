<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string( 'roll_number' )->unique()->comment('Roll No (Must be unique)');
            $table->string('name')->comment('Student Name')->nullable();
            $table->integer('class')->comment('Class (1 to 12th)')->nullable();
            $table->float('score', 8, 2)->comment('Subject Scores for 5 Subjects')->default(0);
            $table->string('avtar')->comment('Student Passport size image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}

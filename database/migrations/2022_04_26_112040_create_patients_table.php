<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father');
            $table->string('mother');
            $table->string('age');
            $table->string('address');
            $table->string('nationality');
            $table->string('profession');
            $table->string('tel');
            $table->string('from');
            $table->string('occupation');
            $table->string('email');
            $table->string('obs')->nullable();

            $table->unsignedBigInteger('fk_schedules_id')->nullable();
            $table->foreign('fk_schedules_id')->references('id')->on('schedules')->onDelete('CASCADE')->onUpgrade('CASCADE');

            $table->unsignedBigInteger('fk_municipes_id')->nullable();
            $table->foreign('fk_municipes_id')->references('id')->on('municipes')->onDelete('CASCADE')->onUpgrade('CASCADE');


            $table->unsignedBigInteger('fk_employees_id')->nullable();
            $table->foreign('fk_employees_id')->references('id')->on('users')->onDelete('CASCADE')->onUpgrade('CASCADE');

            $table->unsignedBigInteger('fk_escorts_id')->nullable();
            $table->foreign('fk_escorts_id')->references('id')->on('escorts')->onDelete('CASCADE')->onUpgrade('CASCADE');


            $table->softDeletes();
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
        Schema::dropIfExists('patients');
    }
}

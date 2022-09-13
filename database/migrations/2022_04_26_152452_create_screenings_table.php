<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScreeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screenings', function (Blueprint $table) {
            $table->id();
            $table->string('height');
            $table->string('weight');
            $table->string('temperature');
            $table->string('heartRate');
            $table->string('respiratoryFrequency');
            $table->string('bloodPressure');
            $table->string('pulse');
            $table->string('obs');

      $table->unsignedBigInteger('fk_patients_id');
     $table->foreign('fk_patients_id')->references('id')->on('patients')->onDelete('CASCADE')->onUpgrade('CASCADE');
       $table->unsignedBigInteger('fk_nurses_id');
       $table->foreign('fk_nurses_id')->references('id')->on('users')->onDelete('CASCADE')->onUpgrade('CASCADE');
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
        Schema::dropIfExists('screenings');
    }
}

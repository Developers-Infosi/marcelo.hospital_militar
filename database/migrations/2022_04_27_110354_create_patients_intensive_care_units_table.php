<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsIntensiveCareUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients_intensive_care_units', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('fk_patients_id');
            $table->foreign('fk_patients_id')->references('id')->on('patients')->onDelete('CASCADE')->onUpgrade('CASCADE');

          
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
        Schema::dropIfExists('patients_intensive_care_units');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_admissions', function (Blueprint $table) {
            $table->id();
            $table->string('couse',255);
            $table->string('roomNumber',255);
            $table->string('bedNumber',255);
            $table->string('typePathology',255);
            $table->string('obs',255);

            $table->unsignedBigInteger('fk_patients_id');
            $table->foreign('fk_patients_id')->references('id')->on('patients')->onDelete('CASCADE')->onUpgrade('CASCADE');

            $table->unsignedBigInteger('fk_doctors_id');
            $table->foreign('fk_doctors_id')->references('id')->on('doctors')->onDelete('CASCADE')->onUpgrade('CASCADE');

            $table->unsignedBigInteger('fk_nurses_id');
            $table->foreign('fk_nurses_id')->references('id')->on('nurses')->onDelete('CASCADE')->onUpgrade('CASCADE');



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
        Schema::dropIfExists('hospital_admissions');
    }
}

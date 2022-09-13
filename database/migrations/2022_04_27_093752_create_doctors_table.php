<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('tel',15);
            $table->string('adress',255);
            $table->string('email',50);
            $table->string('nip',255);
            $table->string('doctorOrder',15);
            $table->string('obs',255);
            $table->unsignedBigInteger('fk_doctorSpecialties_id');
            $table->foreign('fk_doctorSpecialties_id')->references('id')->on('doctor_specialties')->onDelete('CASCADE')->onUpgrade('CASCADE');
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
        Schema::dropIfExists('doctors');
    }
}

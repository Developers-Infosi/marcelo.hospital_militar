<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternConsultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extern_consults', function (Blueprint $table) {

            $table->id();

             $table->foreign('fk_patients_id')->references('id')->on('patients')->onDelete('CASCADE')->onUpgrade('CASCADE');
             $table->unsignedBigInteger('fk_patients_id');

            $table->foreign('fk_doctors_id')->references('id')->on('doctors')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->unsignedBigInteger('fk_doctors_id');

            $table->foreign('fk_examTypes_id')->references('id')->on('exam_types')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->unsignedBigInteger('fk_examTypes_id');

            $table->foreign('fk_externalInscriptions_id')->references('id')->on('external_inscriptions')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->unsignedBigInteger('fk_externalInscriptions_id');


            $table->string('consultDate');
            $table->string('obs');

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
        Schema::dropIfExists('extern_consults');
    }
}

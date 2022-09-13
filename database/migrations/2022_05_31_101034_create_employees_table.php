<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{

    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father');
            $table->string('mother');
            $table->string('birthDate');
            $table->string('bi');
            $table->string('tel');
            $table->string('email');
            $table->string('address');
            $table->string('nip');
            $table->string('contratDate');
            $table->unsignedBigInteger('fk_departments_id');
            $table->foreign('fk_departments_id')->references('id')->on('departments')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->foreign('fk_positions_id')->references('id')->on('positions')->onDelete('CASCADE')->onUpgrade('CASCADE');
            $table->unsignedBigInteger('fk_positions_id');
            $table->string('typeContract');
            $table->string('ContractFile');
            $table->string('employeeType');
            $table->string('literaryQualification');
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
        Schema::dropIfExists('employees');
    }
}

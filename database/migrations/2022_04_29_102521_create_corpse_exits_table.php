<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorpseExitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corpse_exits', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('corpsenumber',255);
            $table->string('drawerNumber',255);
            $table->string('chamberNumnber',255);

            $table->unsignedBigInteger('fk_doctors_id');
            $table->foreign('fk_doctors_id')->references('id')->on('doctors')->onDelete('CASCADE')->onUpgrade('CASCADE');


           // $table->unsignedBigInteger('fk_employees_id');
          //  $table->foreign('fk_employees_id')->references('id')->on('employees')->onDelete('CASCADE')->onUpgrade('CASCADE');


            $table->string('obs',255);
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
        Schema::dropIfExists('corpse_exits');
    }
}

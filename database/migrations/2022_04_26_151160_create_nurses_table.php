<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurses', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('tel',15);
            $table->string('address',255);
            $table->string('nip',50);
            $table->string('position');
            $table->string('email',255);
            $table->string('nurseOrder');
            $table->string('obs',255);

          //  $table->unsignedBigInteger('fk_nurseSpecialties_id');
           // $table->foreign('fk_nurseSpecialties_id')->references('id')->on('name')->onDelete('CASCADE')->onUpgrade('CASCADE');


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
        Schema::dropIfExists('nurses');
    }
}

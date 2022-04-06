<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhasesRequestExtraHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phases__request_extra_hours', function (Blueprint $table) {
            $table->id();
             $table->integer('phase_id')->unsigned()->nullable();
$table->foreign('phase_id')->references('id')->on('phases')->onDelete('cascade')->onUpdate('cascade');
             $table->integer('The_number_of_hours');
             $table->string('Reason_for_the_delay');
             


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
        Schema::dropIfExists('phases__request_extra_hours');
    }
}

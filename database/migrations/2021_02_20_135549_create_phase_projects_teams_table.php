<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhaseProjectsTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phase_projects_teams', function (Blueprint $table) {
           $table->increments('id');
            

 $table->integer('phases_id')->unsigned();
$table->foreign('phases_id')->references('id')->on('phases')->onDelete('cascade')->onUpdate('cascade');


$table->integer('project_id')->unsigned();
$table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
        
           

$table->integer('developers_id')->unsigned();
$table->foreign('developers_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('phase_projects_teams');
    }
}

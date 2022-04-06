<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
           $table->increments('id');
            $table->string('Projectname_ar');
            $table->string('Projectname_en');
            $table->integer('status_id');
            $table->string('desc_ar');
            $table->string('desc_en');
            $table->date('start_date');
            $table->date('registration_date');
            $table->date('end_date');
            $table->date('delivery_date');
            $table->date('notes');
            $table->string('photo')->nullable();
            $table->string('priority');
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
        Schema::dropIfExists('projects');
    }
}

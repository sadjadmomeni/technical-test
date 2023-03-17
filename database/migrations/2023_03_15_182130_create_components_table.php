<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('turbine_id')->unsigned();
            $table->string('name');
            $table->bigInteger('component_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('turbine_id')->references('id')->on('turbines');
            $table->foreign('component_type_id')->references('id')->on('component_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('components');
    }
};

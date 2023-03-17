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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('inspection_id')->unsigned();
            $table->bigInteger('component_id')->unsigned();
            $table->bigInteger('grade_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('inspection_id')->references('id')->on('inspections');
            $table->foreign('component_id')->references('id')->on('components');
            $table->foreign('grade_type_id')->references('id')->on('grade_types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
};

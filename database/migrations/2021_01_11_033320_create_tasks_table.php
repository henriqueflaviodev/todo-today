<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('description', 300)->nullable();
            $table->foreignId('category_id');
            $table->foreignId('current_state_id');
            $table->foreignId('current_priority_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('current_state_id')->references('id')->on('states');
            $table->foreign('current_priority_id')->references('id')->on('priorities');
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
        Schema::dropIfExists('tasks');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id');
            $table->foreignId('state_id');
            $table->date('ended_at')->nullable();
            $table->string('note', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('state_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('state_histories');
    }
}

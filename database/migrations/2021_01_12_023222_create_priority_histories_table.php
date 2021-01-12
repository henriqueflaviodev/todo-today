<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriorityHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priority_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id');
            $table->foreignId('priority_id');
            $table->date('ended_at')->nullable();
            $table->string('note', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('priority_id')->references('id')->on('priorities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('priority_histories');
    }
}

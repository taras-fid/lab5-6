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
        Schema::create('role_workers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id')->unsigned()->nullable();
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
            $table->unsignedBigInteger('worker_id')->unsigned()->nullable();
            $table->foreign('worker_id')
                ->references('id')
                ->on('workers')
                ->onDelete('cascade');
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
        Schema::dropIfExists('role__workers');
    }
};

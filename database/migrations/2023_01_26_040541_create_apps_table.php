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
        Schema::create('apps', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->comment('Apps info');
            $table->id()
                ->comment('#');
            $table->string('name',40)
                ->comment('App name');
            $table->unsignedTinyInteger('platform_id')
                ->comment('platform');
            $table->foreign('platform_id')
                ->references('id')
                ->on('platforms')
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apps');
    }
};

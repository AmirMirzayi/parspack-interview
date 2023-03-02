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
        Schema::create('platforms', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->comment('Platforms');
            $table->unsignedTinyInteger('id',true)
                ->comment('#');
            $table->string('name','20')
                ->comment('Platform\'s name');
            $table->string('url','70')
                ->comment('Platform\'s url to check subscription status');
            $table->unsignedTinyInteger('retry_after_hours',false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platforms');
    }
};

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
        Schema::create('expiration_histories', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->comment('Store expired accounts history');
            $table->date('at_date')
                ->index()
                ->comment('At the date');
            $table->unsignedDecimal('expired_count',10,0)
                ->comment('Total expired accounts');
            $table->unsignedTinyInteger('platform_id')
                ->comment('platform');
            $table->foreign('platform_id')
                ->references('id')
                ->on('platforms')
                ->cascadeOnUpdate();
            $table->primary(['at_date','platform_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expiration_histories');
    }
};

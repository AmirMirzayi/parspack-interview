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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->comment('User\'s subscription status');
            $table->unsignedBigInteger('UID',false)
                ->comment('User\'s ID');
            $table->unsignedBigInteger('APPID',false)
                ->comment('Application\'s ID');
            $table->enum('status',[
                'active',
                'expired',
                'pending',
            ])
                ->comment('Subscription status');
            $table->primary(['UID','APPID']);
            $table->foreign('UID')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->foreign('APPID')
                ->references('id')
                ->on('apps')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_statuses');
    }
};

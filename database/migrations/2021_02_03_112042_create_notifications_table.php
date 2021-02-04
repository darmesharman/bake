<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('text');
            $table->string('link')->nullable();
            $table->string('icon');
            $table->tinyInteger('status')->default(0);
            $table->boolean('viewed')->default(false);
            $table->timestamps();
        });

        Schema::create('notification_user', function (Blueprint $table) {
            $table->foreignId('notification_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();

            $table->primary(['notification_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_user');
        Schema::dropIfExists('notifications');
    }
}

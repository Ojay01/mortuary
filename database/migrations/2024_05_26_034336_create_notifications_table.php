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
        // Create the 'notifications' table
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('corpse_id');
            $table->unsignedBigInteger('user_id');
            $table->string('type');
            $table->timestamp('notification_date'); // Timestamp of when the notification was made
            $table->text('message'); // Text of the notification
            $table->enum('status', ['unread', 'read'])->default('unread'); // Status of the notification
            $table->timestamps();

            // Set foreign key constraints
            $table->foreign('corpse_id')->references('id')->on('corpses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorpsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the 'storages' table
        Schema::create('storages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->enum('type', ['embalment', 'freezer']);
            $table->integer('capacity');
            $table->timestamps();
        });

        // Create the 'brought_in_by' table
        Schema::create('brought_in_by', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('from');
            $table->string('relationship');
            $table->timestamps();
        });

        // Create the 'corpses' table
        Schema::create('corpses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cause_of_death');
            $table->boolean('paid')->default(false);
            $table->string('relative_number');
            $table->boolean('identified')->default(false);
            $table->string('qr_code')->unique();
            $table->unsignedBigInteger('brought_by_id'); // Foreign key to 'brought_in_by' table
            $table->date('removal_date')->nullable(); // New column for removal date
            $table->enum('status', ['missing', 'autopsy', 'removed', 'available'])->default('available'); // New column for status
            $table->unsignedBigInteger('storage_id'); // Foreign key to 'storages' table
            $table->decimal('bill', 8, 2)->default(0.00); // New column for bill amount
            $table->unsignedBigInteger('embalment_id')->nullable();
            $table->unsignedBigInteger('freezer_id')->nullable();
            $table->timestamps();

            // Set foreign key constraints
            // Add foreign key constraints
            $table->foreign('embalment_id')->references('id')->on('storages')->onDelete('set null');
            $table->foreign('freezer_id')->references('id')->on('storages')->onDelete('set null');
            $table->foreign('brought_by_id')->references('id')->on('brought_in_by')->onDelete('cascade');
            $table->foreign('storage_id')->references('id')->on('storages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corpses');
        Schema::dropIfExists('brought_in_by');
        Schema::dropIfExists('storages');
    }
}

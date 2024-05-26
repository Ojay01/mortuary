<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutopsiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the 'autopsies' table
        Schema::create('autopsies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('corpse_id');
            $table->timestamp('withdrawn_at'); // Required
            $table->timestamp('expected_return_at')->nullable();
            $table->string('hospital'); // Hospital where the corpse has been sent
            $table->string('performed_by')->nullable();
            $table->enum('status', ['pending', 'in-progress', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();

            // Set foreign key constraint
            $table->foreign('corpse_id')->references('id')->on('corpses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autopsies');
    }
}

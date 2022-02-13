<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('qty')->default(0)->comment('Vacancies quantity');
            $table->dateTime('from_date')->comment('Start date');
            $table->dateTime('to_date')->comment('End date');
            $table->enum('status', ['Pending', 'Approved', 'Cancel'])->default('Pending')->comment('Booking Status');
            $table->foreignId('vacancies_id')->constrained()->onDelete('cascade')->onUpdate('No Action');
            $table->foreignId('users_id')->constrained()->onDelete('cascade')->onUpdate('No Action');
            $table->softDeletes();
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
        Schema::dropIfExists('reservations');
    }
}

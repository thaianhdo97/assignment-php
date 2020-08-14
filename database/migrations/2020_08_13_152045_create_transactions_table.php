<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('guide_name');
            $table->unsignedBigInteger('guide_id'); // foreign key -> references to 'id' on tour_guides migration
            $table->foreign('guide_id')->references('id')->on('tour_guides');
            $table->unsignedBigInteger('customer_id'); // foreign key -> references to 'id' on customer_accounts migration
            $table->foreign('customer_id')->references('id')->on('customer_accounts');
            $table->string('customer_name');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->dateTime('created_time'); // ngày tạo ra transaction
            $table->integer('status'); // 1. Sent | 2. Confirm | 3. Cancel
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
        Schema::dropIfExists('transactions');
    }
}

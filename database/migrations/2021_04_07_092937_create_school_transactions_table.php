<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('school_id');
            $table->string('school_code');
            $table->string('payment_method')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('type')->nullable();
            $table->string('note')->nullable();
            $table->float('flat_amount',10,2)->default(0)->nullable();
            $table->float('percent_amount',10,2)->default(0)->nullable();
            $table->string('admin_id')->nullable();
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
        Schema::dropIfExists('school_transactions');
    }
}

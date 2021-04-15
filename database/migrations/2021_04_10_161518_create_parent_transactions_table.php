<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_id');
            $table->string('payment_method')->nullable();
            $table->string('date')->nullable();
            $table->string('type')->nullable();
            $table->string('note')->nullable();
            $table->float('old_balance',20,3)->default(0);
            $table->float('debit',20,3)->default(0);
            $table->float('credit',20,3)->default(0);
            $table->float('balance',20,3)->default(0);
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
        Schema::dropIfExists('parent_transactions');
    }
}

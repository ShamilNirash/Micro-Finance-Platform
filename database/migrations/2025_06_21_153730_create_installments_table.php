<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->id();
            $table->string('bill_image')->nullable(false);
            $table->integer('installment_number')->nullable(false);
            $table->dateTime('date_and_time')->nullable(false);
            $table->date('pay_in_date')->nullable(false);
            $table->dateTime('payed_date')->nullable(false);
            $table->date('amount')->nullable(false);
            $table->integer('loan_id')->nullable(false);
            $table->enum('status', ['PAYED', 'UNPAYED'])->default('UNPAYED');
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
        Schema::dropIfExists('installments');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaymentSession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentsessions', function (Blueprint $table) {
            $table->id();
            $table->string('creditCardNum');
            $table->integer('paymentAmount');
            $table->text('paymentPorpose');
            $table->text('sessionId');
            $table->bigInteger('date');
            $table->rememberToken();
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
        Schema::dropIfExists('paymentsessions');
    }
}

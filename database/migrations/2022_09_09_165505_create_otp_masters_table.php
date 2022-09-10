<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtpMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otp_masters', function (Blueprint $table) {
            $table->id();
            $table->string('operation')->nullable();
            $table->string('otp')->nullable();
            $table->tinyInteger('user_id');
            $table->string('status')->default('expired');
            $table->dateTime('valid_till', $precision = 0);
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
        Schema::dropIfExists('otp_masters');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_datas', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('user_id');
            $table->string('company_name')->nullable();
            $table->string('ad_tagline')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('ad_layout')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('country')->nullable();
            $table->string('hblocks')->nullable();
            $table->string('wblocks')->nullable();
            $table->string('imageUrl')->nullable();
            $table->string('tags')->nullable();
            $table->string('description',1000)->nullable();
            $table->string('status')->default('inactive');            
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
        Schema::dropIfExists('ad_datas');
    }
}

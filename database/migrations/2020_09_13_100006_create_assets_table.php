<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('number');
            $table->string('model');
            $table->string('serial_number')->unique();
            $table->string('mac_id')->nullable();
            $table->string('memory');
            $table->string('storage');
            $table->string('amount')->nullable();
            $table->string('bill_image_url')->nullable();
            $table->text('remarks');

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
        Schema::dropIfExists('assets');
    }
}

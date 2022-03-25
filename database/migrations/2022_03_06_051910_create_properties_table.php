<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('price')->nullable();
            $table->string('address')->nullable();
            $table->string('status')->comment('[1] => For Rent, [2] => For Sale')->nullable();
            $table->string('period')->nullable();
            $table->string('type')->nullable();
            $table->string('area')->nullable();
            $table->integer('bedroom')->nullable();
            $table->integer('bathroom')->nullable();
            $table->integer('kitchen')->nullable();
            $table->text('images')->nullable();
            $table->text('videos')->nullable();
            $table->text('amenities')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->dateTime('availability_at')->nullable();
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
        Schema::dropIfExists('properties');
    }
}

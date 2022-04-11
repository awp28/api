<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->integer('region_id');
            $table->string('name_uz');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('name_cyrl');
            $table->integer('phone_kod');
            $table->integer('c_order');
            $table->integer('ns11_code');
            $table->bigInteger('soato');
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
        Schema::dropIfExists('cities');
    }
}

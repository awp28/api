<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->string('phone', 13);                            // Mobil raqami
            $table->string('passport', 9);                          // Passport
            $table->date('passport_given_date')->nullable();             // Passport berilgan vaqt
            $table->string('tin', 9)->nullable();                               // STIR(INN)

            $table->string('s_name', 30);                           // Familiyasi
            $table->string('f_name', 30);                           // Ismi
            $table->string('m_name', 30);                           // Otasini ismi

            $table->tinyInteger('gender')->default(0);              // Jinsi
            $table->date('birth_date')->nullable();                 // Tug'ilgan sanasi
            $table->integer('region_id');                           // Hudud(viloyat)
            $table->integer('city_id');                             // Tuman(shahar)
            $table->string('street')->nullable();                   // Mahalla/ko'cha/uy

            $table->integer('user_id')->default(0);  // Operator  id si

            $table->jsonb('data')->nullable(); // qoshimcha malumotlar(ish,oila va hokazo)

            $table->string('pin')->nullable();
            $table->integer('created_by')->nullable();
            $table->boolean('created_migration')->default(false)->nullable(); // true bolsa migration.mehnata.uz dan kelgan fuqarolar
            $table->string('citizenship')->nullable();
            $table->integer('sync')->default(0);
            $table->tinyInteger('one_id_status')->default(0);
            $table->string('additional_passport')->nullable();
            $table->boolean('is_reestr')->default(false);
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
        Schema::dropIfExists('citizens');
    }
}

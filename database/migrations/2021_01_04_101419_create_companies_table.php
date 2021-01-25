<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //Название
            $table->foreignId('category_id')->constrained();  // Категория
            $table->foreignId('sub_category_id')->nullable()->constrained();  // Податегория
            $table->foreignId('city_id')->constrained(); // Город
            $table->foreignId('district_id')->nullable()->constrained(); // Район
            $table->foreignId('micro_district_id')->nullable()->constrained(); // Микрорайон
            $table->string('company_image')->nullable(); //Фото
            $table->longText('description'); // Описание
            $table->longText('short_description'); // Краткое описание
            $table->string('site')->nullable(); //Сайт
            $table->string('email')->unique(); //E-mail
            $table->string('phone_number')->unique(); // Основной телефон
            $table->unsignedBigInteger('views')->default(0); // Просмотры
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
        Schema::dropIfExists('companies');
    }
}

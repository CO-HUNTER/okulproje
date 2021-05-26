<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uyeler', function (Blueprint $table) {
            $table->id('uyeid');
            $table->string('ad');
            $table->string('soyad');
            $table->string('klncad');
            $table->string('sifre');
            $table->text('eposta');
            $table->integer('durum');
            $table->string('aktivasyon')->nullable();
            $table->text('resim')->nullable();
            $table->dateTime('dt',$precision = 0);
            $table->timestamps('kytzmn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

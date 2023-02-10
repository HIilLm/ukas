<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBayarMingguTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayar_minggu', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pembayaran_id')->unsigned();
            $table->foreign('pembayaran_id')->references('id')->on('pembayaran')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->bigInteger('kelas_id')->unsigned();
            $table->foreign('kelas_id')->references('id')->on('kelas')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->bigInteger('belum_byr')->unsigned();
            $table->integer('mng_1')->default('0');
            $table->integer('mng_2')->default('0');
            $table->integer('mng_3')->default('0');
            $table->integer('mng_4')->default('0');
            $table->integer('mng_5')->default('0');
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
        Schema::dropIfExists('bayar_minggu');
    }
}

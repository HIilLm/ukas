<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uang', function (Blueprint $table) {
            $table->id();
            $table->string("bulan");
            $table->string("tahun");
            $table->string("bayar");
            $table->bigInteger('kelas_id')->unsigned();
            $table->foreign('kelas_id')->references('id')->on('kelas')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('uang');
    }
}

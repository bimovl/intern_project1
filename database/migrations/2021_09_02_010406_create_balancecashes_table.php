<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalancecashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balancecashes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->integer('saldo_awal');
            $table->enum('transaksi', ['deposit', 'transfer', 'withdraw', 'recieve']);
            $table->integer('jumlah_transaksi');
            $table->enum('status',['pending', ['success']]);
            $table->integer('saldo_akhir');
            $table->foreignId('penerima')->nullable()->index();
            $table->foreignId('pengirim')->nullable()->index();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('penerima')->references('id')->on('users');
            $table->foreign('pengirim')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('balancecashes');
    }
}




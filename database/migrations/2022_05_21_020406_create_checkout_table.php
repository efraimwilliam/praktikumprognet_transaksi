<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('id_produk');
            $table->string('total');
            $table->string('bukti_pembayaran');
            $table->enum('status', ['valid', 'expired', 'waiting', 'sampai_tujuan', 'dalam_pengiriman', 'reviewed']);
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
        Schema::dropIfExists('checkout');
    }
};

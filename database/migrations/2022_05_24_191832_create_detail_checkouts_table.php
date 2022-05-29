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
        Schema::create('detail_checkouts', function (Blueprint $table) {
            $table->id();
            $table->string('id_checkout');
            $table->string('id_produk');
            $table->string('qty');
            $table->string('diskon');
            $table->string('harga_produk');
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
        Schema::dropIfExists('detail_checkouts');
    }
};

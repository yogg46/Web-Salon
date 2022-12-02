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
        Schema::create('detail_layanans', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('subtotal');
            $table->unsignedBigInteger('layanan_id')->constrained()
                ->onUpdate('cascade');
            $table->unsignedBigInteger('jasa_id')->constrained()
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
        Schema::dropIfExists('detail_layanans');
    }
};
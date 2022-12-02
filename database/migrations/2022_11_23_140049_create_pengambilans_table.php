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
        Schema::create('pengambilans', function (Blueprint $table) {
            $table->id();
            $table->string('no_pengambilan');
            $table->string('tanggal')->default(now());
            $table->integer('jumlah')->default(0);
            $table->unsignedBigInteger('user_id')->constrained()
                ->onUpdate('cascade');
            $table->unsignedBigInteger('barang_id')->constrained()
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
        Schema::dropIfExists('pengambilans');
    }
};
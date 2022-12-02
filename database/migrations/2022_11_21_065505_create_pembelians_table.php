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
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->string('manufaktur');
            $table->string('tanggal')->default(now()->format('d-m-Y'));
            $table->bigInteger('total')->nullable();
            $table->unsignedBigInteger('petugas_gudang')->constrained()
                ->onUpdate('cascade');
            $table->unsignedBigInteger('suplier_id')->constrained()
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
        Schema::dropIfExists('pembelians');
    }
};
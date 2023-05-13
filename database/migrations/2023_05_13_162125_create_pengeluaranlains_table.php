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
        Schema::create('pengeluaranlains', function (Blueprint $table) {
            $table->id();
            // $table->string('manufaktur');
            $table->unsignedBigInteger('user_id')->constrained()
                ->onUpdate('cascade');
            $table->string('keterangan');
            $table->integer('total');
            $table->dateTime('tanggal');
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
        Schema::dropIfExists('pengeluaranlains');
    }
};

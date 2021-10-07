<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTesisatIsAdimlarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tesisat_is_adimlaris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('data_key')->default(0);
            $table->string('title');
            $table->double('tahmin_zaman', 15.2);
            $table->double('gerceklesen_zaman', 15.2);
            $table->double('kayip_zaman', 15.2);
            $table->text('aciklama');
            $table->integer('ordering');
            $table->unsignedBigInteger('tesisatlar_id');
            $table->tinyInteger('state')->default(0);

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
        Schema::dropIfExists('tesisat_is_adimlaris');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTesisatlarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tesisatlars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tesisat_no');
            $table->timestamp('baslama_tarihi');
            $table->timestamp('teslim_tarihi');
            $table->unsignedBigInteger('projeler_id');
            $table->decimal('birim_fiyati')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tesisatlars');
    }
}

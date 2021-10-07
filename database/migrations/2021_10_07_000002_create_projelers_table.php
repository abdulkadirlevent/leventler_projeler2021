<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjelersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projelers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cari_id');
            $table->string('proje_adi');
            $table->string('sozlezme_no');
            $table->string('image')->nullable();
            $table->timestamp('baslama_tarihi');
            $table->timestamp('teslim_tarihi');
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
        Schema::dropIfExists('projelers');
    }
}

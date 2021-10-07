<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ticari_unvani');
            $table->string('cari_kodu');
            $table->string('adi');
            $table->string('soyadi');
            $table->string('vergi_dairesi')->nullable();
            $table->integer('vergi_no')->nullable();
            $table->unsignedBigInteger('user_id');

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
        Schema::dropIfExists('caris');
    }
}

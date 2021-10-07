<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToTesisatIsAdimlarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tesisat_is_adimlaris', function (Blueprint $table) {
            $table
                ->foreign('tesisatlar_id')
                ->references('id')
                ->on('tesisatlars')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tesisat_is_adimlaris', function (Blueprint $table) {
            $table->dropForeign(['tesisatlar_id']);
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToTesisatlarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tesisatlars', function (Blueprint $table) {
            $table
                ->foreign('projeler_id')
                ->references('id')
                ->on('projelers')
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
        Schema::table('tesisatlars', function (Blueprint $table) {
            $table->dropForeign(['projeler_id']);
        });
    }
}

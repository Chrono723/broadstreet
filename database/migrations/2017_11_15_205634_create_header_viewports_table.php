<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeaderViewportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_viewports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('property');
            $table -> boolean('is_active');
            $table -> timestamps();
            $table -> enum('pages', [
                'front',
                'back',
                'all',
                'hybrid',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('header_viewports');
    }
}

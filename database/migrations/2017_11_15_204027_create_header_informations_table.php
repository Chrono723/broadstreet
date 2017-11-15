<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeaderInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_informations', function (Blueprint $table) {
            $table->increments('id');
            $table -> string('author')-> unqiue();
            $table -> string('description');
            $table -> boolean('is_active');
            $table -> string('icon')->default('/images/logos/gow-mac/favicon.png');
            $table->timestamps();
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
        Schema::dropIfExists('header_informations');
    }
}

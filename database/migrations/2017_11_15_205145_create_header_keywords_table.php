<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeaderKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_keywords', function (Blueprint $table) {
            $table -> increments('id');
            $table -> string('name') -> unqiue();
            $table -> boolean('is_active');
            $table -> timestamps();
            $table -> enum('pages', [
                'front',
                'back',
                'hybrid',
                'all',
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
        Schema::dropIfExists('header_keywords');
    }
}

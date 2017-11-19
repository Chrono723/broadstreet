<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uri');
            $table->string('name')->nullable();
            $table -> enum('status', [
                'up',
                'down',
                'soon',
                'admin',
            ])->default('up');
            $table -> enum('request_method', [
                'GET',
                'PUT',
                'POST',
                'DELETE'
            ])->default('GET');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('page_statuses');
    }
}

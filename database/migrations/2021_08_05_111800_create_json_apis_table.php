<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJsonApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('json_apis', function (Blueprint $table) {
            $table->id();
            $table->string('UID');
            $table->string('xapikey');
            $table->string('status');
            $table->string('userName');
            $table->string('userSurname');
            $table->string('userEmail');
            $table->string('userPhone');
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
        Schema::dropIfExists('json_apis');
    }
}

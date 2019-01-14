<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nom',255);
            $table->string('prenom',255);
            $table->string('email',255);
            $table->string('status',255);
            $table->string('password',255);
            $table->boolean('is_super')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('profs');
    }
}

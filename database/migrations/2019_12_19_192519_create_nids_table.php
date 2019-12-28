<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('name_eng');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('img');
            $table->string('district');
            $table->string('division');
            $table->string('upuzilla');
            $table->date('dob');
            $table->integer('status')->default(1);
            $table->integer('sex');
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
        Schema::dropIfExists('nids');
    }
}

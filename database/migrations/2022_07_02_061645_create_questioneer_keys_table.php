<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questioneer_keys', function (Blueprint $table) {
            $table->id();
            $table->string('questioneer_title');
            $table->longText('questioneer_description');
            $table->string('questions_list');
            $table->string('questioneer_key');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('questioneer_keys');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string("image_path");

            $table->foreignId('card_id')
            ->constrained()
            ->onDelete('cascade'); // 参照先が削除されたら同時に削除

            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade'); // 参照先が削除されたら同時に削除

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
        Schema::dropIfExists('images');
    }
}

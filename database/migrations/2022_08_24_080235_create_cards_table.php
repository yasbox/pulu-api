<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade'); // 参照先が削除されたら同時に削除

            $table->string('name');
            $table->string('name_kana');
            $table->string('face_photo');
            $table->string('organization_name');
            $table->string('organization_logo');
            $table->string('position_name');
            $table->string('zip');
            $table->text('address');
            $table->string('tel');
            $table->string('tel2');
            $table->string('fax');
            $table->string('email');
            $table->string('site');
            $table->text('description');
            $table->string('image_photo');
            $table->integer('sort_num');
            $table->boolean('valid');
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
        Schema::dropIfExists('cards');
    }
}

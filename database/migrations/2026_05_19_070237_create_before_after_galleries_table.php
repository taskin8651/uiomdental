<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeforeAfterGalleriesTable extends Migration
{
    public function up()
    {
        Schema::create('before_after_galleries', function (Blueprint $table) {
            $table->id();

            $table->string('before_label')->nullable();
            $table->string('before_alt')->nullable();

            $table->string('after_label')->nullable();
            $table->string('after_alt')->nullable();

            $table->string('title')->nullable();
            $table->text('description')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('before_after_galleries');
    }
}
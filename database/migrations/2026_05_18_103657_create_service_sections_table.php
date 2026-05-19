<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('service_sections', function (Blueprint $table) {
            $table->id();

            $table->string('tag')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();

            $table->string('button_1_text')->nullable();
            $table->string('button_1_url')->nullable();
            $table->string('button_1_icon')->nullable();

            $table->string('button_2_text')->nullable();
            $table->string('button_2_url')->nullable();
            $table->string('button_2_icon')->nullable();

            $table->string('float_icon')->nullable();
            $table->string('float_title')->nullable();
            $table->string('float_subtitle')->nullable();

            $table->string('image_alt')->nullable();

            $table->enum('layout_type', ['image_left', 'image_right'])->default('image_left');

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_sections');
    }
}
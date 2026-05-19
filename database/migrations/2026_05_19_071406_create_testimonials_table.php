<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();

            $table->string('customer_name')->nullable();
            $table->string('customer_type')->nullable();
            $table->string('avatar_letter')->nullable();
            $table->unsignedTinyInteger('rating')->default(5);
            $table->longText('review_text')->nullable();

            $table->boolean('is_featured')->default(0);
            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
}
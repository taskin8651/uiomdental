<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryItemsTable extends Migration
{
    public function up()
    {
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('gallery_category_id')
                ->nullable()
                ->constrained('gallery_categories')
                ->nullOnDelete();

            $table->string('label')->nullable();
            $table->string('title')->nullable();
            $table->string('alt_text')->nullable();

            $table->enum('card_size', ['normal', 'large', 'tall', 'wide'])->default('normal');

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gallery_items');
    }
}
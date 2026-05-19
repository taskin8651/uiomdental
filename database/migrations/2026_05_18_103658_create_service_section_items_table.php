<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceSectionItemsTable extends Migration
{
    public function up()
    {
        Schema::create('service_section_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('service_section_id')
                ->constrained('service_sections')
                ->cascadeOnDelete();

            $table->string('icon')->nullable();
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
        Schema::dropIfExists('service_section_items');
    }
}
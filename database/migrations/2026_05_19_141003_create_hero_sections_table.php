<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('badge_icon')->nullable();
            $table->string('badge_text')->nullable();
            $table->string('title')->nullable();
            $table->string('highlight_title')->nullable();
            $table->longText('description')->nullable();
            $table->string('stat_1_number')->nullable();
            $table->string('stat_1_text')->nullable();
            $table->string('stat_2_number')->nullable();
            $table->string('stat_2_text')->nullable();
            $table->string('stat_3_number')->nullable();
            $table->string('stat_3_text')->nullable();
            $table->string('top_card_icon')->nullable();
            $table->string('top_card_title')->nullable();
            $table->string('top_card_text')->nullable();
            $table->string('bottom_card_icon')->nullable();
            $table->string('bottom_card_title')->nullable();
            $table->string('bottom_card_text')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hero_sections');
    }
}

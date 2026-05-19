<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutPageSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('about_page_sections', function (Blueprint $table) {
            $table->id();

            $table->string('intro_tag')->nullable();
            $table->string('intro_title')->nullable();
            $table->longText('intro_description_1')->nullable();
            $table->longText('intro_description_2')->nullable();

            $table->string('intro_button_text')->nullable();
            $table->string('intro_button_url')->nullable();

            $table->string('experience_number')->nullable();
            $table->string('experience_text')->nullable();

            $table->string('feature_1_icon')->nullable();
            $table->string('feature_1_title')->nullable();

            $table->string('feature_2_icon')->nullable();
            $table->string('feature_2_title')->nullable();

            $table->string('feature_3_icon')->nullable();
            $table->string('feature_3_title')->nullable();

            $table->string('feature_4_icon')->nullable();
            $table->string('feature_4_title')->nullable();

            $table->string('mission_icon')->nullable();
            $table->string('mission_title')->nullable();
            $table->longText('mission_description')->nullable();

            $table->string('vision_icon')->nullable();
            $table->string('vision_title')->nullable();
            $table->longText('vision_description')->nullable();

            $table->string('approach_icon')->nullable();
            $table->string('approach_title')->nullable();
            $table->longText('approach_description')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_page_sections');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDentistProfileSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('dentist_profile_sections', function (Blueprint $table) {
            $table->id();

            $table->string('profile_tag')->nullable();
            $table->string('doctor_name')->nullable();
            $table->string('designation')->nullable();
            $table->longText('description')->nullable();

            $table->string('experience_number')->nullable();
            $table->string('experience_text')->nullable();

            $table->string('qualification_icon')->nullable();
            $table->string('qualification_label')->nullable();
            $table->string('qualification_value')->nullable();

            $table->string('specialization_icon')->nullable();
            $table->string('specialization_label')->nullable();
            $table->string('specialization_value')->nullable();

            $table->string('button_1_text')->nullable();
            $table->string('button_1_url')->nullable();
            $table->string('button_1_icon')->nullable();

            $table->string('button_2_text')->nullable();
            $table->string('button_2_url')->nullable();
            $table->string('button_2_icon')->nullable();

            $table->string('availability_tag')->nullable();
            $table->string('availability_title')->nullable();
            $table->string('availability_icon')->nullable();

            $table->string('schedule_1_label')->nullable();
            $table->string('schedule_1_value')->nullable();

            $table->string('schedule_2_label')->nullable();
            $table->string('schedule_2_value')->nullable();

            $table->string('schedule_3_label')->nullable();
            $table->string('schedule_3_value')->nullable();

            $table->string('schedule_4_label')->nullable();
            $table->string('schedule_4_value')->nullable();

            $table->longText('availability_note')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dentist_profile_sections');
    }
}
<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class DentistProfileSection extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    public $table = 'dentist_profile_sections';

    protected $fillable = [
        'profile_tag',
        'doctor_name',
        'designation',
        'description',

        'experience_number',
        'experience_text',

        'qualification_icon',
        'qualification_label',
        'qualification_value',

        'specialization_icon',
        'specialization_label',
        'specialization_value',

        'button_1_text',
        'button_1_url',
        'button_1_icon',

        'button_2_text',
        'button_2_url',
        'button_2_icon',

        'availability_tag',
        'availability_title',
        'availability_icon',

        'schedule_1_label',
        'schedule_1_value',

        'schedule_2_label',
        'schedule_2_value',

        'schedule_3_label',
        'schedule_3_value',

        'schedule_4_label',
        'schedule_4_value',

        'availability_note',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('dentist_profile_image')->singleFile();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
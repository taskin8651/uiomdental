<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AboutPageSection extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    public $table = 'about_page_sections';

    protected $fillable = [
        'intro_tag',
        'intro_title',
        'intro_description_1',
        'intro_description_2',
        'intro_button_text',
        'intro_button_url',
        'experience_number',
        'experience_text',

        'feature_1_icon',
        'feature_1_title',
        'feature_2_icon',
        'feature_2_title',
        'feature_3_icon',
        'feature_3_title',
        'feature_4_icon',
        'feature_4_title',

        'mission_icon',
        'mission_title',
        'mission_description',

        'vision_icon',
        'vision_title',
        'vision_description',

        'approach_icon',
        'approach_title',
        'approach_description',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('about_intro_image')->singleFile();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
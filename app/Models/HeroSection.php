<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class HeroSection extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    public $table = 'hero_sections';

    protected $fillable = [
        'badge_icon',
        'badge_text',
        'title',
        'highlight_title',
        'description',
        'stat_1_number',
        'stat_1_text',
        'stat_2_number',
        'stat_2_text',
        'stat_3_number',
        'stat_3_text',
        'top_card_icon',
        'top_card_title',
        'top_card_text',
        'bottom_card_icon',
        'bottom_card_title',
        'bottom_card_text',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('hero_image')->singleFile();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ServiceSection extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    public $table = 'service_sections';

    protected $fillable = [
        'tag',
        'title',
        'description',
        'button_1_text',
        'button_1_url',
        'button_1_icon',
        'button_2_text',
        'button_2_url',
        'button_2_icon',
        'float_icon',
        'float_title',
        'float_subtitle',
        'image_alt',
        'layout_type',
        'sort_order',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function items()
    {
        return $this->hasMany(ServiceSectionItem::class)
            ->orderBy('sort_order', 'asc');
    }

    public function activeItems()
    {
        return $this->hasMany(ServiceSectionItem::class)
            ->where('status', 1)
            ->orderBy('sort_order', 'asc');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('service_section_image')->singleFile();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
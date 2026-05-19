<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class WebsiteSetting extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    public $table = 'website_settings';

    protected $fillable = [
        'site_name',
        'site_tagline',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_title',
        'og_description',
        'contact_email',
        'contact_number',
        'whatsapp_number',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('site_logo')->singleFile();
        $this->addMediaCollection('site_favicon')->singleFile();
        $this->addMediaCollection('og_image')->singleFile();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

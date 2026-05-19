<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BeforeAfterGallery extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    public $table = 'before_after_galleries';

    protected $fillable = [
        'before_label',
        'before_alt',
        'after_label',
        'after_alt',
        'title',
        'description',
        'sort_order',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('before_image')->singleFile();
        $this->addMediaCollection('after_image')->singleFile();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class GalleryCategory extends Model
{
    use SoftDeletes;

    public $table = 'gallery_categories';

    protected $fillable = [
        'name',
        'slug',
        'sort_order',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($category) {
            if (!$category->slug && $category->name) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function items()
    {
        return $this->hasMany(GalleryItem::class)
            ->orderBy('sort_order', 'asc');
    }

    public function activeItems()
    {
        return $this->hasMany(GalleryItem::class)
            ->where('status', 1)
            ->orderBy('sort_order', 'asc');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
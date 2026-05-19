<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceSectionItem extends Model
{
    use SoftDeletes;

    public $table = 'service_section_items';

    protected $fillable = [
        'service_section_id',
        'icon',
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

    public function serviceSection()
    {
        return $this->belongsTo(ServiceSection::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
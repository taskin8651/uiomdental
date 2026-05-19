<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppointmentRequest extends Model
{
    use SoftDeletes;

    public $table = 'appointment_requests';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'age',
        'service',
        'date',
        'time',
        'visit_type',
        'message',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

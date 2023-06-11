<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'event_title',
        'start_date',
        'end_date',
        'description',
        'location',
        'banner_image',
        'show_on_website',
        'members_only',
        'managed_by',
    ];
}

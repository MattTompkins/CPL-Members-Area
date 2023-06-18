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

    /**
     * Method to search for users on ID, name or email
     * 
     * @param $search search query string
     * @return object
     */
    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()
            ->where('id', 'like', '%' . $search . '%')
            ->orWhere('event_title', 'like', '%' . $search . '%')
            ->orWhere('location', 'like', '%' . $search . '%')
            ->orWhere('start_date', 'like', '%' . $search . '%');
    }
}

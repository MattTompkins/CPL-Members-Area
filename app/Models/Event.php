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
     * Get attachments relating to specific event(s)
     *
     * @return object
     */
    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'attached_to_id')->where('attached_to_type', 'event');
    }

    /**
     * Undocumented function
     *
     * @param string $name name of the file
     * @param string $filePath file path of the file
     * @param boolean $private whether the file is private or not
     * @return void
     */
    public function attachFile($name, $filePath, $private = false)
    {
        $attachment = new Attachment([
            'name' => $name,
            'file_path' => $filePath,
            'private' => $private,
            'attached_to_type' => 'event',
            'attached_to_id' => $this->id,
        ]);

        $attachment->save();

        return $attachment;
    }

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

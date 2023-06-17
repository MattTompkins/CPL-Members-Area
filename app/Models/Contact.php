<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = [
        'name',
        'organisation',
        'email',
        'phone1',
        'phone2',
        'notes',
    ];

     /**
     * Method to search for contacts by name, email or organisation
     * 
     * @param $search search query string
     * @return object
     */
    public static function search($search) {
        return empty($search) ? static::query()
            : static::query()
            ->where('id', 'like', '%'.$search.'%')
            ->orWhere('name', 'like', '%'.$search.'%')
            ->orWhere('organisation', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%');
    }

}

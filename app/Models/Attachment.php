<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'file_path',
        'private',
        'attached_to_type',
        'attached_to_id',
    ];
}

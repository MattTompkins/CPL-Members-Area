<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountSetting extends Model
{
    use HasFactory;

    protected $table = 'account_settings';

    public $fillable = [
        'created_at',
        'updated_at',
        'show_profile',
        'show_contact_info',
        'show_qualifications',
        'show_my_events',
        'show_my_training',
        'receive_emails',
    ];
}

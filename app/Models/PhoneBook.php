<?php

namespace App\Models;

use App\Casts\PhoneCast;
use Illuminate\Database\Eloquent\Model;

class PhoneBook extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
    ];

    protected function casts(): array
    {
        return [
            'phone' => PhoneCast::class,
        ];
    }
}

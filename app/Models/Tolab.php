<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tolab extends Authenticatable
{
    protected $fillable = [
        'firstname',
        'secname',
        'walyphone',
        'phone',
        'year',
        'governorate',
        'pass'
    ];

    protected $hidden = [
        'pass'
    ];
    public function getAuthPassword()
{
    return $this->pass;
}


     protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'pass' => 'hashed',
        ];
    }
}

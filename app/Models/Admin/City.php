<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'customer_id',
        'name',
        'email',
        'phone',
        'contact_person',
        'password',
    ];
}

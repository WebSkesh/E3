<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'password',
        'number_of_objects',
        'email',
        'phone',
        'started_at',
        'paid_to',
        'paid_all',
    ];


    public function cities()
    {
        return $this->hasMany('App\Models\Admin\Cities', 'customer_id', 'id');
    }


    public function categories()
    {
        return $this->hasMany('App\Models\Admin\Category', 'customer_id', 'id');
    }
}

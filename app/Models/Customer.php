<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'city',
        'password',
        'number_of_objects',
        'contact_person',
        'email',
        'phone',
        'started_at',
        'one_institution_price',
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

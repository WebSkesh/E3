<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Institution extends Model
{
    protected $fillable = [
        'customer_id',
        'city_id',
        'category_id',
        'name',
        'email',
        'phone',
        'contact_person',
        'address',
    ];


    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id', 'id');
    }


    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id', 'id');
    }


    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function role()
    {
        return $this->hasOne('App\Models\UserRole', 'user_role_id', 'id');
    }
}

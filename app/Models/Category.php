<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'customer_id',
        'city_id',
        'name',
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id', 'id');
    }

    public function institutions()
    {
        return $this->hasMany('App\Models\Admin\Institution', 'category_id', 'id');
    }
}

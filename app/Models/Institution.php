<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Institution extends Model
{
    const KEY_CHIEF = 'chief';
    const KEY_ADMIN = 'admin';
    const KEY_USER = 'user';
    const KEY_SUPER_ADMIN = 'superAdmin';

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

    public static function isManagement($userId)
    {
        $institution = static::find($userId);
        if ($institution->role->name == static::KEY_ADMIN ||
            $institution->role->name == static::KEY_CHIEF) {
            return true;
        }

        return false;
    }

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
        return $this->hasOne('App\Models\UserRole', 'id', 'user_role_id');
    }
}

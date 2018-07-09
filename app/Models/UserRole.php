<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class UserRole extends Model
{
    protected $table = 'user_roles';

    public function institution() {
        return $this->belongsTo('App\Models\Institution', 'user_role_id', 'id');
    }
}

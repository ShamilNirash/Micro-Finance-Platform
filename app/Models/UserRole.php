<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'int';


    protected $fillable = [
        'role_name',
        'status'
    ];
    function user_role()
    {
        return $this->hasMany('App\Models\User', 'user_role_id', 'id');
    }
}

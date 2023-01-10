<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    /*public function isAdmin()
    {
        return $this->is_admin === 1;
    }*/
}

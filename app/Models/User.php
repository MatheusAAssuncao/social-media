<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'surname',
        'age',
        'gender',
    ];

    public function friends()
    {
        return $this->hasMany(UserConnection::class, 'friend_id', 'user_id');
    }
}

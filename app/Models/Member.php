<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $table = 'GroupTimer.members';

    protected $fillable = [
        'username',
        'email',
        'password_hash',
        'coin_balance',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $primaryKey = "member_id";
    public $timestamps = false;

    public function setPasswordHashAttribute($value)
    {
        $this->attributes['password_hash'] = bcrypt($value);
    }
}
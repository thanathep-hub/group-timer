<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupMember extends Model
{
    use HasFactory;

    protected $table = 'GroupTimer.group_members';

    protected $fillable = [
        'group_id',
        'member_id',
        'join_date',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $primaryKey = "group_member_id";
    public $timestamps = false;
}

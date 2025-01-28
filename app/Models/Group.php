<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $table = 'GroupTimer.groups';

    protected $fillable = [
        'group_name',
        'owner_id',
        'package_id',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $primaryKey = "group_id";
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_name',
        'max_members',
        'coin',
        'duration_days',
        'status',
        'created_at',
        'package_img_url',
        'max_bosses'
    ];
    protected $table = 'GroupTimer.packages';
    public $primaryKey = "package_id";
    public $timestamps = false;
}

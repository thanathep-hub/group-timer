<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BossDeathLog extends Model
{
    use HasFactory;

    protected $table = 'GroupTimer.boss_death_logs';

    protected $fillable = [
        'boss_id ',
        'group_id',
        'death_time',
        'next_spawn_time',
        'screenshot_url',
        'notes',
        'created_at',
        'updated_at',
    ];

    protected $primaryKey = "log_id";
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bosses extends Model
{
    use HasFactory;

    protected $table = 'GroupTimer.bosses';

    protected $fillable = [
        'game_id ',
        'map_id',
        'boss_name',
        'boss_image_url',
        'level',
        'hp',
        'respawn_time',
        'respawn_variance',
        'last_death_time',
        'next_spawn_time',
        'spawn_x',
        'spawn_y',
        'description',
        'status',
        'created_at',
        'updated_at',
    ];

    public $primaryKey = "boss_id";
    public $timestamps = false;
}

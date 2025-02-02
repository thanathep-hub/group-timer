<?php

namespace App\Http\Controllers;

use App\Models\BossDeathLog;
use App\Models\Bosses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function fetch_boss(Request $request)
    {
        $group_id = $request->query('group_id');

        $bosses = DB::table('VAM_Aek.GroupTimer.bosses as bs')
            ->select([
                'bs.boss_id',
                'bs.map_id',
                'bs.boss_name',
                'bs.boss_image_url',
                'bs.respawn_time',
                'bs.respawn_variance'
            ])
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Bosses retrieved successfully',
            'data' => $bosses
        ], 200);
    }

    public function fetch_boss_select(Request $request)
    {
        $group_id = $request->query('group_id');
        $boss_select =
            DB::table('VAM_Aek.GroupTimer.bosses as bs')
            ->leftJoin('VAM_Aek.GroupTimer.boss_death_logs as log', 'log.boss_id', '=', 'bs.boss_id')
            ->where('group_id', $group_id)
            ->select([
                'bs.boss_id',
                'bs.map_id',
                'bs.boss_name',
                'bs.boss_image_url',
                'bs.respawn_time',
                'bs.respawn_variance',
                'log.death_time',
                'log.next_spawn_time',
                'log.killed_by'
            ])
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Bosses retrieved successfully',
            'data' => $boss_select
        ], 200);
    }
}

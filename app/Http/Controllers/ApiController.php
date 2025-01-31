<?php

namespace App\Http\Controllers;

use App\Models\BossDeathLog;
use App\Models\Bosses;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function fetch_boss(Request $request)
    {
        $game_id = $request->query('game_id');
        $bosses = Bosses::where('game_id', $game_id)->get();

        if ($bosses->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No bosses found for this game'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Bosses retrieved successfully',
            'data' => $bosses
        ], 200);
    }

    public function fetch_boss_select(Request $request)
    {
        $group_id = $request->query('group_id');
        $boss_select = BossDeathLog::where('group_id', $group_id)->get();

        return response()->json([
            'status' => true,
            'message' => 'Bosses retrieved successfully',
            'data' => $boss_select
        ], 200);
    }
}
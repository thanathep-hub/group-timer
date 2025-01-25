<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.home');
    }

    public function apiBoss()
    {

        $boss = DB::select("
            SELECT
                bo.boss_id,
                bo.boss_name,
                bo.boss_time_cooldown,
                bo.boss_revive,
                bo.map_id,
                map.map_name,
                map.map_pic
            FROM
                VAM_Aek.GroupTimer.boss_mt bo
                LEFT JOIN VAM_Aek.GroupTimer.map_mt map ON bo.map_id = map.map_id
            ORDER BY
                bo.boss_id
        ");

        // if(!$boss){
        //     return response()->json([])
        // }
        return response()->json($boss);
    }
}

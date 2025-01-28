<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $boss = $this->boss();
        return view('home.home', compact('boss'));
    }

    public function boss()
    {

        $boss = DB::select("
            SELECT
                bo.boss_id,
                bo.boss_name,
                bo.boss_time_cooldown,
                bo.boss_pic,
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
        return $boss;
    }
}
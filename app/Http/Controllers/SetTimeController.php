<?php

namespace App\Http\Controllers;

use App\Models\BossDeathLog;
use App\Models\Bosses;
use App\Models\Group;
use App\Models\GroupMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SetTimeController extends Controller
{
    public function joinGroup()
    {
        $groups = $this->fetchGroup(session('member')->member_id);
        return view('home.join-group', compact('groups'));
    }

    public function setTime()
    {
        return view('home.set-time');
    }

    public function fetchGroup($id)
    {
        try {
            $groups = DB::table('VAM_Aek.GroupTimer.group_members as gm')
                ->select(
                    'gm.group_id',
                    'gp.group_name',
                    'pk.package_img_url',
                    DB::raw('COUNT(gm2.member_id) AS total_members'),
                    DB::raw('COUNT(log.group_id) AS total_boss')
                )
                ->leftJoin('VAM_Aek.GroupTimer.groups as gp', 'gm.group_id', '=', 'gp.group_id')
                ->leftJoin('VAM_Aek.GroupTimer.group_members as gm2', 'gm.group_id', '=', 'gm2.group_id')
                ->leftJoin('VAM_Aek.GroupTimer.boss_death_logs as log', 'gm.group_id', '=', 'log.group_id')
                ->leftJoin('VAM_Aek.GroupTimer.packages as pk', 'gp.package_id', '=', 'pk.package_id')
                ->where('gm.member_id', $id)
                ->groupBy('gm.group_id', 'gp.group_name', 'package_img_url')
                ->get();

            return $groups;
        } catch (\Throwable $th) {
            Log::error('Error fetching groups: ' . $th->getMessage());
        }
    }

    public function groupBoss($id)
    {
        $group_id = $id;

        $check_group = GroupMember::where('group_id', $group_id)
            ->where('member_id', session('member')->member_id)
            ->first();

        if (!$check_group) {
            return response()->json([
                'status' => 'warning',
                'message' => 'คุณไม่ได้อยู่ในกลุ่มนี้'
            ], 400);
        }

        $boss_in_group = DB::table('VAM_Aek.GroupTimer.boss_death_logs as log')
            ->leftJoin('VAM_Aek.GroupTimer.bosses as bs', 'log.boss_id', '=', 'bs.boss_id')
            ->select(
                'log.log_id',
                'log.boss_id',
                'bs.boss_name',
                'bs.boss_image_url',
                'log.death_time',
                'bs.respawn_time',
                'bs.respawn_variance',
                'log.killed_by',
                'log.next_spawn_time'
            )
            ->where('log.group_id', $group_id)
            ->orderBy('log.created_at', 'asc')
            ->get();

        $boss_all = Bosses::all();

        return view('boss.select-boss', compact('boss_in_group', 'boss_all'));
    }
}

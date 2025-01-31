<?php

namespace App\Http\Controllers;

use App\Models\BossDeathLog;
use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Facades\Log;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    protected $member;

    public function __construct()
    {
        $this->member = session('member') ? Member::where('member_id', session('member')->member_id)->first() : null;
    }
    public function showGroup()
    {
        $package = $this->fetchPackage();

        return view('home.show-group', compact('package'));
    }

    public function createGroup(Request $request)
    {

        $request->validate([
            'package_id' => 'required|integer',
            'group_name' => 'required|string|max:255'
        ]);

        // Ensure member exists
        if (!$this->member) {
            return response()->json([
                'status' => 'error',
                'message' => 'ไม่พบข้อมูลสมาชิก'
            ], 403);
        }

        // Check if group name already exists
        if (Group::where('group_name', $request->group_name)->exists()) {
            return response()->json([
                'status' => 'warning',
                'message' => 'มีชื่อกลุ่มนี้แล้ว ใช้ชื่ออื่น'
            ], 400);
        }

        // Fetch package details
        $package = Package::find($request->package_id);
        if (!$package) {
            return response()->json([
                'status' => 'error',
                'message' => 'ไม่พบแพ็กเกจที่เลือก'
            ], 400);
        }

        // Check coin balance
        if ($this->member->coin_balance < $package->coin) {
            return response()->json([
                'status' => 'warning',
                'message' => 'เหรียญไม่เพียงพอ'
            ], 400);
        }

        DB::beginTransaction();
        try {

            $member = Member::where('member_id', $this->member->member_id)->lockForUpdate()->first();

            // Create group
            $group = Group::create([
                'package_id' => $request->package_id,
                'group_name' => $request->group_name,
                'owner_id'  => $this->member->member_id ?? null,
                'status' => 1
            ]);

            // Deduct coins
            $member->update(['coin_balance' => $member->coin_balance - $package->coin]);

            GroupMember::create([
                'group_id' => $group->group_id,
                'member_id' => $this->member->member_id,
                'join_date' => now(),
                'status' => 'active'
            ]);

            DB::commit();

            return response()->json([
                'message' => 'สร้างกลุ่มสำเร็จ',
                'data' => [
                    'status' => 'success',
                    'group_id' => $group->group_id,
                    'package_id' => $group->package_id,
                    'group_name' => $group->group_name
                ]
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'เกิดข้อผิดพลาด ไม่สามารถสร้างกลุ่มได้',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateGroup(Request $request)
    {
        //
    }

    public function deleteGroup(Request $request)
    {
        //
    }
    public function fetchPackage()
    {
        try {
            $package = Package::all();
            return $package;
        } catch (\Throwable $th) {
            Log::error($th);
        }
    }

    public function selectBoss(Request $request)
    {
        DB::beginTransaction();
        try {
            BossDeathLog::firstOrCreate(
                [
                    'boss_id' => $request->boss_id,
                    'group_id' => 5,
                ],
                [
                    'killed_by' => session('member')->member_id,
                ]
            );

            DB::commit();

            return response()->json([
                'status' => true,
                'boss_id' => $request->boss_id,
                'message' => 'Boss selected successfully!'
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'boss_id' => $request->boss_id,
                'message' => 'Boss selection failed!'
            ], 422);  // Using 422 Unprocessable Entity for validation/business logic errors
        }
    }
}
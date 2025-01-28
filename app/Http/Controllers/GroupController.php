<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Facades\Log;
use App\Models\Group;

class GroupController extends Controller
{
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

        $checkGroup = Group::where('group_name', $request->group_name)
            ->first();

        if ($checkGroup) {
            return response()->json([
                'status' => 'error',
                'message' => 'มีชื่อกลุ่มนี้แล้ว ใช้ชื่ออื่น'
            ], 400);
        }

        $createGroup =  Group::create([
            'package_id' => $request->package_id,
            'group_name' => $request->group_name,
            'owner_id'  => '', // wait member id
            'status' => 1
        ]);

        if (!$createGroup) {
            return response()->json([
                'status' => 'error',
                'message' => 'เกิดข้อผิดพลาด ไม่สามารถสร้างกลุ่มได้'
            ], 500);
        }

        return response()->json([
            'message' => 'สร้างกลุ่มสำเร็จ',
            'data' => [
                'status' => 'success',
                'package_id' => $request->package_id,
                'group_name' => $request->group_name
            ]
        ], 200);
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
}

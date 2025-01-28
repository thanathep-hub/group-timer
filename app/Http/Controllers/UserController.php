<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {


        $errors = $this->validateRegisterData($request);

        if (!empty($errors)) {
            return response()->json([
                'status' => 400,
                'message' => 'Validation failed',
                'errors' => $errors
            ], 400);
        }

        $member = new Member();
        $member->username = $request->username;
        $member->email = $request->email;
        $member->coin_balance = 0;
        $member->status = 1;
        $member->password_hash = $request->password;
        $member->save();

        return response()->json([
            'status' => 200,
            'message' => 'สมัครสมาชิกสำเร็จ',
        ], 200);
    }


    public function showLogin()
    {
        return view('auth.login');
    }

    public function logout()
    {
        session()->flush();

        return redirect('/login');
    }

    public function showRememberPassword()
    {
        // return view('auth.remember_password');
    }

    public function validateRegisterData($request)
    {
        $errors = [];

        // ตรวจสอบ username
        if (!$request->has('username') || empty($request->username)) {
            $errors['username'] = 'กรุณาระบุชื่อผู้ใช้งาน.';
        } elseif (Member::where('username', $request->username)->exists()) {
            $errors['username'] = 'ชื่อผู้ใช้งานนี้ถูกใช้งานแล้ว.';
        }

        // ตรวจสอบ email
        if (!$request->has('email') || !filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'กรุณาระบุอีเมล.';
        } elseif (Member::where('email', $request->email)->exists()) {
            $errors['email'] = 'อีเมลนี้ถูกใช้งานแล้ว.';
        }

        // ตรวจสอบ password
        if (!$request->has('password') || strlen($request->password) < 6) {
            $errors['password'] = 'กรุณาระบุรหัสผ่าน อย่างน้อย 6 ตัว.';
        }

        return $errors;
    }
}

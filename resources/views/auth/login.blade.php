@extends('auth.app')
@section('title', 'เข้าสู่ระบบ')
@section('content')

    <style>
        .card {
            height: fit-content;
            min-height: 400px;
            width: 400px;
            border-radius: 1rem;
            background-image: linear-gradient(#c1e0f6, 20%, #ffffff);
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
        }

        .btn-login {
            background-color: #efc55f;
            border-color: #efc55f;
            height: 44px;
            border-radius: 1rem;
            font-weight: 700;
            color: #ffffff;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .btn-login:hover {
            background-color: #eaae35;
            border-color: #eaae35;
            height: 44px;
            border-radius: 1rem;
            font-weight: 700;
            color: #ffffff;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        input {
            height: 44px;
            border: 1px solid #f3f4f6 !important;
        }

        .text-gray {
            color: #6b7280;
        }

        .bot-img {
            height: 100px;
            filter: drop-shadow(3px 5px 2px rgb(0 0 0 / 0.4));
        }

        .btn-register {
            width: fit-content;
            border-bottom: 4px solid transparent;
        }

        .btn-register:hover {
            border-bottom: 4px solid #efc55f;
        }
    </style>


    <div class="bg-img"></div>
    <div class="card border-0 p-4">
        <div class="text-center mb-4">
            <img class="bot-img mb-2" src="/bg/float-top-dV3lMph1.png" alt="" height="100" />
            <h2>เข้าสู่ระบบ</h2>
        </div>
        <form accept="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input name="username" type="text" class="form-control" placeholder="ชื่อผู้ใช้งาน" required />
            </div>
            <div class="mb-3">
                <input name="password" type="password" class="form-control" placeholder="รหัสผ่าน" required />
            </div>
            <a href="{{ route('auth.remember_password') }}"
                class="d-block text-gray text-end mb-1 text-decoration-none">ลืมรหัสผ่าน?</a>
            <button type="submit" class="btn btn-login w-100">เข้าสู่ระบบ</button>
        </form>
        <div class="d-flex justify-content-center text-center mt-3 mb-3">
            <a href="{{ route('register') }}" class="btn-register text-black text-decoration-none">สมัครสมาชิก</a>
        </div>
    </div>

@endsection

@push('scripts')
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'เข้าสู่ระบบไม่สำเร็จ',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
@endpush

@extends('auth.app')
@section('title', 'สมัครสมาชิก')
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

        .btn-register {
            background-color: #efc55f;
            border-color: #efc55f;
            height: 44px;
            border-radius: 1rem;
            font-weight: 700;
            color: #ffffff;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .btn-register:hover {
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

        .btn-login {
            width: fit-content;
            border-bottom: 4px solid transparent;
        }

        .btn-login:hover {
            border-bottom: 4px solid #efc55f;
        }
    </style>


    <div class="bg-img"></div>
    <div class="card border-0 p-4">
        <div class="text-center mb-4">
            <img class="bot-img mb-2" src="/bg/float-top-dV3lMph1.png" alt="" height="100" />
            <h2>สมัครสมาชิก</h2>
        </div>
        <div class="border-bottom mb-3"></div>
        <form id="register-form">
            @csrf
            @method('POST')
            <div class="mb-3">
                <input type="text" class="form-control" name="username" id="username" placeholder="ชื่อผู้ใช้งาน"
                    required />
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                    placeholder="อีเมล" required />
            </div>
            <div class="mb-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="รหัสผ่าน"
                    required />
            </div>
            <div class="border-bottom mb-3"></div>
            <button type="button" onclick="register()" class="btn btn-register w-100">สมัครสมาชิก</button>
        </form>
        <div class="d-flex justify-content-center text-center mt-3 mb-3">
            <a href="{{ route('login') }}" class="btn-login text-black text-decoration-none">เข้าสู่ระบบ</a>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            console.log('ready');

        });

        function register() {
            console.log('registering');
            $.ajax({
                type: "POST",
                url: "{{ route('register.submit') }}",
                data: {
                    username: $('#username').val(),
                    email: $('#email').val(),
                    password: $('#password').val(),
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.status === 200) {
                        $('#register-form')[0].reset();
                        Swal.fire({
                            icon: 'success',
                            title: 'สำเร็จ',
                            text: response.message,
                            showConfirmButton: true,
                            timer: 1500
                        });

                    }
                },
                error: function(xhr) {
                    let errorMessage = "";
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        errorMessage += value + "\n";
                    });
                    Swal.fire({
                        icon: 'warning',
                        title: 'เกิดข้อผิดพลาด',
                        text: errorMessage,
                    });
                }
            });
        }
    </script>
@endpush

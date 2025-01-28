<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>เข้าสู่ระบบ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Corben:wght@400;700&family=Fira+Code:wght@300..700&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Noto+Sans+Thai:wght@100..900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Noto Sans Thai', sans-serif;
            font-size: 14x;
        }

        .bg-img {
            /* background-image: url("/bg/bg-login.jpg"); */
            background-image: url("{{ asset('bg/bg-timer-blur.png') }}");
            position: fixed;
            height: 100%;
            width: 100%;
            background-size: cover;
            background-position: center;
            z-index: -1;
        }

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
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100 bg-primary bg-gradient">
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
            <a href="{{ route('auth.login') }}" class="btn-login text-black text-decoration-none">เข้าสู่ระบบ</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            console.log('ready');

        });

        function register() {
            console.log('registering');
            $.ajax({
                type: "POST",
                url: "{{ route('auth.register') }}",
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

</body>

</html>

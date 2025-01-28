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
            background-image: url("/bg/bg-login.jpg");
            position: fixed;
            height: 100%;
            width: 100%;
            background-size: cover;
            background-position: center;
            z-index: -1;
        }

        .card {
            height: 400px;
            width: 400px;
            border-radius: 1rem;
            background-image: linear-gradient(#c1e0f6, 20%, #ffffff);
            box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px,
                rgba(255, 255, 255, 0.8) 0px -2px 16px 0px;
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
        }

        .btn-register:hover {
            border-bottom: 4px solid #efc55f;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100 bg-primary bg-gradient">
    <div class="bg-img"></div>
    <div class="card border-0 p-4">
        <div class="text-center mb-4">
            <img class="bot-img" src="/bg/float-top-dV3lMph1.png" alt="" height="100" />
        </div>
        <form>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="ชื่อผู้ใช้งาน" required />
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="รหัสผ่าน" required />
            </div>
            <a href="#" class="d-block text-gray text-end mb-1 text-decoration-none">ลืมรหัสผ่าน?</a>
            <button type="submit" class="btn btn-login w-100">เข้าสู่ระบบ</button>
        </form>
        <div class="d-flex justify-content-center text-center mt-3 mb-3">
            <a href="#" class="btn-register text-black text-decoration-none">สมัครสมาชิก</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

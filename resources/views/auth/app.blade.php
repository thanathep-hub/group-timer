<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">

    {{-- ย้าย CSS ไปไฟล์แยก --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        :root {
            --primary-font: 'Noto Sans Thai', sans-serif;
            --base-font-size: 14px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            height: 100%;
        }

        body {
            font-family: var(--primary-font);
            font-size: var(--base-font-size);
            min-height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .background-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .background-image {
            background-image: url("{{ asset('bg/bg-timer-blur.webp') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;
            transform: scale(1.1);
            /* ป้องกันขอบขาวเวลา effect blur */
            filter: blur(5px);
            position: absolute;
        }

        .content-wrapper {
            position: relative;
            z-index: 1;
            flex: 1;
            width: 100%;
        }
    </style>

    @stack('css')
</head>

<body>
    <div class="background-wrapper">
        <div class="background-image"></div>
    </div>

    <div class="content-wrapper d-flex align-items-center justify-content-center">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     const bgImage = new Image();
        //     bgImage.onload = function() {
        //         document.querySelector('.background-image').style.backgroundImage = `url(${bgImage.src})`;
        //     };
        //     bgImage.src = "{{ asset('bg/bg-timer-blur.webp') }}";
        // });
    </script>
    @stack('scripts')
</body>

</html>

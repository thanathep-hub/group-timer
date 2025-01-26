{{--  --}}

<style>
    .navbar-brand {
        font-weight: lighter;
    }

    .nav-link {
        border-bottom: 4px solid transparent;
        width: fit-content;
    }

    .nav-link:hover {
        border-bottom: 4px solid #2563eb;
    }
</style>
{{--  --}}
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand text-uppercase" href="#">group-timer</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">🏠 หน้าหลัก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/show-group">👨‍👩‍👧‍👦 กลุ่ม</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/set-time">⏱️ เซ็ตเวลา</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">⚔️ จัดการบอส</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/how-to-use">📖 วิธีใช้งาน</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">👨🏻‍💻 สมัครสมาชิก</a>
                </li>

                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        ⏱️ เซ็ตเวลา
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li> --}}
            </ul>
            {{-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> --}}
        </div>
    </div>
</nav>

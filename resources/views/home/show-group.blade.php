@extends('layout.app')
@section('title', 'BOT-TIMER')
@section('content')

    <style>
        .card-body {
            min-height: 70vh;
        }

        .h5 {
            color: #52555d;
        }

        @media (max-width: 992px) {
            /*  */
        }

        .table {
            --bs-table-bg: transparent;
            background-color: transparent;
            border-collapse: collapse;
            overflow: hidden;
        }

        .card {
            background-color: #eff6ff1a;
            backdrop-filter: blur(10px);
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .group-info {
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        }

        .button-55 {
            align-self: center;
            background-color: transparent;
            background-image: none;
            background-position: 0 90%;
            background-repeat: repeat no-repeat;
            background-size: 4px 3px;
            border-radius: 15px 225px 255px 15px 15px 255px 225px 15px;
            border-style: solid;
            border-width: 2px;
            box-shadow: rgba(0, 0, 0, .2) 15px 28px 25px -18px;
            box-sizing: border-box;
            color: #41403e;
            cursor: pointer;
            display: inline-block;
            font-family: Neucha, sans-serif;
            font-size: 1rem;
            line-height: 23px;
            outline: none;
            padding: .75rem;
            text-decoration: none;
            transition: all 235ms ease-in-out;
            border-bottom-left-radius: 15px 255px;
            border-bottom-right-radius: 225px 15px;
            border-top-left-radius: 255px 15px;
            border-top-right-radius: 15px 225px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-55:hover {
            box-shadow: rgba(0, 0, 0, .3) 2px 8px 8px -5px;
            transform: translate3d(0, 2px, 0);
        }

        .button-55:focus {
            box-shadow: rgba(0, 0, 0, .3) 2px 8px 4px -6px;
        }


        /* modal */

        .modal-content {}

        /* CSS */
        .button-30 {
            align-items: center;
            appearance: none;
            background-color: #FCFCFD;
            border-radius: 4px;
            border-width: 0;
            box-shadow: rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
            box-sizing: border-box;
            color: #36395A;
            cursor: pointer;
            display: inline-flex;
            font-family: "JetBrains Mono", monospace;
            height: 44px;
            justify-content: center;
            line-height: 1;
            list-style: none;
            overflow: hidden;
            padding-left: 16px;
            padding-right: 16px;
            position: relative;
            text-align: left;
            text-decoration: none;
            transition: box-shadow .15s, transform .15s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            will-change: box-shadow, transform;
            font-size: 18px;
        }

        .button-30:focus {
            box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
        }

        .button-30:hover {
            box-shadow: rgba(45, 35, 66, 0.4) 0 4px 8px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
            transform: translateY(-2px);
        }

        .button-30:active {
            box-shadow: #D6D6E7 0 3px 7px inset;
            transform: translateY(2px);
        }
    </style>
    <div class="container">
        <div class="group-menu">
            <div class="title">
                <h2 style="color: #52555d;">
                    <strong><i class="fa-solid fa-users-line pe-2"></i> สร้างกลุ่ม</strong>
                </h2>
            </div>
            <div class="mb-3"></div>
            <div class="group-list mb-3">
                <div class="row">
                    @if ($package)
                        @foreach ($package as $item)
                            <div class="col-12 col-lg-3 mb-3">
                                <div class="card border-0 group-detail p-4">
                                    <div class="group-img text-center mb-3">
                                        <img src="{{ $item->package_img_url ? $item->package_img_url : '' }}" alt=""
                                            width="120" height="120">

                                    </div>
                                    <div class="group-name text-center mb-3">
                                        <h5 class="h5">{{ $item->package_name ? $item->package_name : '' }}</h5>
                                    </div>
                                    <div class="group-info align-content-center text-center mb-3">
                                        <div class="card border-0 p-1">
                                            <table class="table m-0">
                                                <tbody></tbody>
                                                <tr>
                                                    <td class="border-end">จำนวนสมาชิก</td>
                                                    <td>
                                                        @if ($item->max_members > 99)
                                                            ไม่จำกัด
                                                        @else
                                                            {{ $item->max_members ? $item->max_members : '' }}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border-end">จำนวนบอส</td>
                                                    <td>
                                                        @if ($item->max_bosses > 99)
                                                            ไม่จำกัด
                                                        @else
                                                            {{ $item->max_bosses ? $item->max_bosses : '' }}
                                                        @endif
                                                </tr>
                                                <tr>
                                                    <td class="border-end">ระยะเวลา</td>
                                                    <td>{{ $item->duration_days ? $item->duration_days : '' }} วัน</td>
                                                </tr>
                                                <tr>
                                                    <td class="border-end border-bottom-0">ใช้ Coin</td>
                                                    <td class="border-bottom-0">
                                                        {{ $item->coin ? number_format($item->coin) : '' }} coin
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                    </div>

                                    <div>
                                        <div class="text-center">
                                            <a onclick="showFormGroup({{ $item->package_id }}, '{{ $item->package_name }}')"
                                                class="button-55">
                                                สร้างกลุ่ม {{ $item->package_name ? $item->package_name : '' }}
                                            </a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        @endforeach

                    @endif
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="groupModal" tabindex="-1" aria-labelledby="groupModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content border-0">
                    <div class="modal-header border-0">
                        <h1 class="modal-title fs-5" id="package_group"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form-create-group">
                            @csrf
                            @method('POST')
                            <input type="text" name="package_id" id="package_id" hidden>
                            <div class="mb-3">
                                <label for="group_name" class="form-label">ชื่อกลุ่ม (Group Name)</label>
                                <input type="text" class="form-control" id="group_name" name="group_name" required>
                            </div>
                            <div id="coinHelp" class="form-text text-end mb-3">ระบบจะหักจาก coin ของคุณ.</div>
                            <div class="d-flex justify-content-end mb-3">
                                <button type="button" id="btn-create-group" onclick="createGroup()" class="btn button-30"
                                    disabled>
                                    ใช้ coin เพื่อสร้างกลุ่ม
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#group_name').on('input', function() {
                if ($(this).val() != '') {
                    $('#btn-create-group').prop('disabled', false);
                } else {
                    $('#btn-create-group').prop('disabled', true);
                }
            });
        });

        function showFormGroup(package_id, package_name) {
            $('#package_group').text('สร้างกลุ่ม ' + package_name);
            $('#package_id').val(package_id);
            $('#groupModal').modal('show');
        }

        function createGroup() {
            var package_id = $('#package_id').val();
            var group_name = $('#group_name').val();

            console.log(package_id, group_name); // ตรวจสอบค่า package_id และ group_name

            $.ajax({
                type: "POST",
                url: "{{ route('create-group') }}",
                data: {
                    package_id: package_id,
                    group_name: group_name,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response);

                    if (response.status == 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'เกิดข้อผิดพลาด',
                            text: response.message,
                            confirmButtonText: 'OK'
                        });
                    } else {
                        $('#groupModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'สร้างกลุ่มสำเร็จ',
                            text: response.message,
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // console.error("Error:", xhr.responseText);

                    let errorMessage = "เกิดข้อผิดพลาดในการส่งข้อมูล";
                    let icon = 'error';
                    try {
                        let response = JSON.parse(xhr.responseText);
                        if (response.message) {
                            errorMessage = response.message;
                            if (["success", "error", "warning", "info"].includes(response.status)) {
                                icon = response.status;
                            }
                        }
                    } catch (e) {
                        console.error("JSON Parse Error:", e);
                    }
                    Swal.fire({
                        icon: icon,
                        title: 'ข้อผิดพลาด',
                        text: errorMessage,
                        confirmButtonText: 'OK'
                    });
                }
            });
        }
    </script>
@endpush

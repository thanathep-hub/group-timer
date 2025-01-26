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
            background-color: #ececee40;
            backdrop-filter: blur(2px);
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
    </style>
    <div class="container">
        <div class="group-menu">
            <div class="title">
                <h2 style="color: #52555d;">
                    <strong><i class="fa-solid fa-users-line pe-2"></i> สร้างกลุ่ม</strong>
                </h2>
            </div>
            <div class="mb-3"></div>
            <div class="group-list">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="group-detail">
                            <div class="group-img text-center mb-3">
                                <img src="" alt="" width="120" height="120">
                            </div>
                            <div class="group-name text-center mb-3">
                                <h5 class="h5">Ghostring</h5>
                            </div>
                            <div class="group-info align-content-center text-center mb-3">
                                <div class="card border-0 p-1">
                                    <table class="table m-0">
                                        <tbody></tbody>
                                        <tr>
                                            <td class="border-end">จำนวนสมาชิก</td>
                                            <td>ไม่จำกัด</td>
                                        </tr>
                                        <tr>
                                            <td class="border-end">จำนวนบอส</td>
                                            <td>ไม่จำกัด</td>
                                        </tr>
                                        <tr>
                                            <td class="border-end">ระยะเวลา</td>
                                            <td>30 วัน</td>
                                        </tr>
                                        <tr>
                                            <td class="border-end border-bottom-0">ใช้ Coin</td>
                                            <td class="border-bottom-0">150 coin</td>
                                        </tr>
                                    </table>
                                </div>

                            </div>

                            <div>
                                <div class="text-center">
                                    <a href="#" class="button-55">สร้างกลุ่ม Ghostring</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection

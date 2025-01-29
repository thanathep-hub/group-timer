@extends('layout.app')
@section('title', 'BOT-TIMER')
@section('content')

    <style>
        .card {
            background-color: #eff6ff1a;
            backdrop-filter: blur(10px);
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .h5 {
            color: #52555d;
        }

        .form-select {
            width: fit-content;
        }

        .btn-add-group {
            align-self: center;
            background-color: #fff;
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

        .btn-choose {
            position: relative;
            overflow: hidden;
            border: 1px solid #dee2e6;
            color: #18181a;
            display: inline-block;
            text-decoration: none;
            cursor: pointer;
            background: #fff;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .btn-choose:hover {
            background-color: #1d4ed8;
            border: 1px solid #1d4ed8;
            color: #fff;
        }

        .btn-add-group:hover {
            box-shadow: rgba(0, 0, 0, .3) 2px 8px 8px -5px;
            transform: translate3d(0, 2px, 0);
        }

        .btn-add-group:focus {
            box-shadow: rgba(0, 0, 0, .3) 2px 8px 4px -6px;
        }

        .add-group {
            justify-content: end;
            padding-right: 1.25rem;
        }

        @media (max-width: 992px) {
            .add-group {
                justify-content: end;
                padding-right: 0;
            }
        }

        .img-fluid {
            max-height: 200px;
        }

        ul {
            list-style-type: none;
        }

        .border-group-list {
            border-bottom: 2px solid #ffffff1c !important
        }
    </style>
    <div class="container">
        <div class="game-menu">
            <div class="title">
                <h2 style="color: #52555d;">
                    <strong>เซ็ตเวลา 📅</strong>
                    {{-- <img src="https://forum.playragnarokonlinebr.com/uploads/emoticons/f4.gif" height="100"> --}}
                </h2>
            </div>
            <div class="border-bottom mb-3"></div>
            <div class="menu-list">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body my-3">
                                <div class="d-flex justify-content-center mb-3">
                                    <h5>⚠️ หากไม่มีกลุ่ม กรุณาสร้างกลุ่มก่อน</h5>
                                </div>
                                <div class="add-group d-flex mb-3">
                                    <a href="/show-group">
                                        <button type="button" class="btn-add-group p-2">➕
                                            สร้างกลุ่ม</button>
                                    </a>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="card mb-3">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img src="https://static.wikia.nocookie.net/ragnarok_gamepedia_en/images/3/30/RO_DarkLord%28SD%29.png"
                                                        class="img-fluid p-4 justify-content-center" alt="...">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title">AEK0001</h5>
                                                        <div class="border-bottom border-group-list mb-1"></div>
                                                        <ul class="p-0">
                                                            <li><strong>จำนวนสมาชิก : </strong>12 คน</li>
                                                            <li><strong>จำนวนบอส : </strong>3 คน</li>
                                                            <li class="mt-2"><strong>🗿เจ้าของกลุ่ม : </strong>aek001213
                                                            </li>
                                                        </ul>
                                                        <a href="#" class="btn btn-primary">🏁 เข้าร่วมกลุ่ม</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="card mb-3" style="max-width: 540px;">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img src="https://static.wikia.nocookie.net/ragnarok_gamepedia_en/images/3/30/RO_DarkLord%28SD%29.png"
                                                        class="img-fluid p-4 justify-content-center" alt="...">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title">AEK0001</h5>
                                                        <div class="border-bottom border-group-list mb-1"></div>
                                                        <ul class="p-0">
                                                            <li><strong>จำนวนสมาชิก : </strong>12 คน</li>
                                                            <li><strong>จำนวนบอส : </strong>3 คน</li>
                                                            <li class="mt-2"><strong>🗿เจ้าของกลุ่ม : </strong>aek001213
                                                            </li>
                                                        </ul>
                                                        <a href="#" class="btn btn-primary">เข้าร่วมกลุ่ม</a>
                                                    </div>
                                                </div>
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

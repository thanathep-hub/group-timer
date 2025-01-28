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
    </style>
    <div class="container">
        <div class="game-menu">
            <div class="title">
                <h2 style="color: #52555d;">
                    <strong>เซ็ตเวลา</strong>
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
                                    <h5>⚠️ หากไม่มีกลุ่ม กรูณาสร้างกลุ่มก่อน</h5>
                                </div>
                                <div class="add-group d-flex mb-3">
                                    <a href="/show-group">
                                        <button type="button" class="btn-add-group p-2">➕
                                            สร้างกลุ่ม</button>
                                    </a>

                                </div>

                                <div class="d-flex justify-content-center">
                                    <div class="mb-3">
                                        <label>เลือกกลุ่ม : </label>
                                        <select class="form-select d-inline" aria-label="Default select example">
                                            <option selected>กรุณาเลือกกลุ่มผู้ใช้งาน</option>
                                            <option value="1">One</option>
                                        </select>
                                        <button type="button" class="btn btn-choose ms-2">เลือก</button>
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

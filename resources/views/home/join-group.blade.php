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
            max-height: 120px;
            max-width: 110px;
        }

        ul {
            list-style-type: none;
        }

        .border-group-list {
            border-bottom: 2px solid #ffffff1c !important
        }

        .btn-join-group {
            color: #030712;
            background-color: #ffffff;
            text-transform: uppercase;
            border-radius: 3px;
            border: 1px solid #030712;
        }

        .btn-join-group:hover {
            color: #030712;
            background-color: #f3f4f6;
            border: 1px solid #030712;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
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

                                    @if ($groups)
                                        @foreach ($groups as $item)
                                            <div class="col-12 col-lg-4">
                                                <div class="card border-0 mb-3">
                                                    <div class="row g-0">
                                                        <div class="col-12 col-md-auto align-content-center text-center">
                                                            <img src="{{ $item->package_img_url ? $item->package_img_url : '' }}"
                                                                class="img-fluid p-2 justify-content-center" alt="...">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <h5 class="card-title">กลุ่ม
                                                                    {{ $item->group_name ? $item->group_name : '' }}</h5>
                                                                <div class="border-bottom border-group-list mb-1"></div>
                                                                <ul class="p-0">
                                                                    <li><strong>จำนวนสมาชิก :
                                                                        </strong>{{ $item->total_members ? $item->total_members : '' }}
                                                                        คน</li>
                                                                    <li><strong>จำนวนบอส :
                                                                        </strong>{{ $item->total_boss ? $item->total_boss : 0 }}
                                                                    </li>
                                                                    </li>
                                                                </ul>
                                                                <a href="{{ route('group.boss', ['id' => $item->group_id]) }}"
                                                                    class="btn btn-join-group">
                                                                    🏁 เข้าร่วมกลุ่ม
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif


                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endsection

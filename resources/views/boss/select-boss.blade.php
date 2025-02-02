@extends('layout.app')
@section('title', 'BOT-TIMER')
@section('content')

    <style>
        .card {
            background-color: #eff6ff1a;
            backdrop-filter: blur(10px);
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .card-boss {
            background-color: transparent;
        }

        .boss-detail {
            justify-content: center;
            text-align: center;
        }

        .boss-img {
            width: auto;
            height: 100%;
            max-height: 100px;
            text-align: center;
            /*  */
            background-color: black;
            background-blend-mode: multiply;
        }

        .badge {
            background-color: #172a54;
            padding-top: .5rem;
            color: #ffffff;
        }

        .btn-select-boss {
            color: #030712;
            background-color: #ffffff;
            text-transform: uppercase;
            border-radius: 3px;
            border: 1px solid #030712;
        }

        .btn-select-boss:hover {
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
                    <strong>เลือก Boss ☠️</strong>
                    {{-- <img src="https://forum.playragnarokonlinebr.com/uploads/emoticons/f4.gif" height="100"> --}}
                </h2>
            </div>
            <div class="border-bottom mb-3"></div>
            <div class="menu-list">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body my-3">
                                {{--  --}}
                                <div class="row" id="boss-select">
                                </div>
                                <div class="border-bottom mb-3"></div>
                                <div class="row" id="boss-unselect">

                                    {{-- @if ($boss_all)
                                        @foreach ($boss_all as $item)
                                            <div class="col-12 col-md-6 col-lg-3 mb-3" id="boss{{ $item->boss_id }}">
                                                <div class="card card-boss p-4 border-0">
                                                    <div class="boss-detail">
                                                        <h6>
                                                            {{ $item->boss_name ? $item->boss_name : '' }}
                                                        </h6>
                                                        <div style="">
                                                            <img class="boss-img mb-3"
                                                                src="{{ $item->boss_image_url ? $item->boss_image_url : '' }}"
                                                                alt="">
                                                        </div>
                                                        <div>
                                                            <button class="btn btn-select-boss"
                                                                onclick="chooseBoss({{ $item->boss_id }})"
                                                                type="button">เลือกบอส</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    @endif --}}

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let boss_select = [];
        let boss_unselect = [];
        let group_id = {{ $group_id ?? null }};

        $(document).ready(async function() {
            await fetchBossUnselect();
            await fetchBossSelect();
            setBoss(); // ทำงานหลังจากดึงข้อมูลเสร็จ
        });

        function fetchBossUnselect() {
            console.log("fetch boss unselect");
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: "{{ route('fetch.boss') }}?game_id=" + group_id,
                    method: "GET",
                    success: function(response) {
                        boss_unselect = response.data;
                        console.log(response);

                        resolve();
                    },
                    error: function(xhr) {
                        console.error("Error fetching boss:", xhr);
                        reject(xhr);
                    }
                });
            });
        }

        function fetchBossSelect() {
            console.log("fetch boss select");
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: "{{ route('boss.select') }}?group_id=" + group_id,
                    method: "GET",
                    success: function(response) {
                        boss_select = response.data;
                        resolve();
                    },
                    error: function(xhr) {
                        console.error("Error fetching boss select:", xhr);
                        reject(xhr);
                    }
                });
            });
        }

        function setBoss() {
            let set_all = "";
            let set_boss = "";

            boss_unselect.forEach(element => {
                set_all += `
            <div class="col-12 col-md-6 col-lg-3 mb-3" id="boss_${element.boss_id}">
                <div class="card card-boss p-4 border-0">
                    <div class="boss-detail">
                        <h6>${element.boss_name}</h6>
                        <div>
                            <img class="boss-img mb-3" src="${element.boss_image_url}">
                        </div>
                        <div>
                            <button class="btn btn-select-boss"
                                onclick="chooseBoss(${element.boss_id})"
                                type="button">เลือกบอส</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
            });

            boss_select.forEach(element => {
                set_boss += `
                    <div class="col-12 col-md-6 col-lg-3 mb-3" id="boss_${element.boss_id}">
                        <div class="card card-boss p-4 border-0">
                            <div class="boss-detail">
                                <h6>${element.boss_name}</h6>
                                <div>
                                    <img class="boss-img mb-3" src="${element.boss_image_url}">
                                </div>
                                <div>
                                    <button class="btn btn-select-boss"
                                        onclick="chooseBoss(${element.boss_id})"
                                        type="button">เลือกบอส</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });

            $('#boss-unselect').html(set_all); // ใช้ .html() แทน .append() เพื่อเคลียร์ข้อมูลเก่าก่อน
            $('#boss-select').html(set_boss);
        }

        function chooseBoss(id) {
            const boss_id = id;

            $.ajax({
                url: "{{ route('boss.selected') }}",
                method: "POST",
                data: {
                    group_id: group_id,
                    boss_id: boss_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.status === true) {

                    } else {
                        console.log(response);
                    }
                },
                error: function(xhr) {
                    console.error("Error starting countdown:", xhr);
                }
            });
        }
    </script>
@endpush

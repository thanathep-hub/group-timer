{{-- style --}}

<style>
    .boss-img {
        width: 100%;
        max-width: 134px;
        height: 100%;
        max-height: 134px;
    }

    .map-img {
        height: 100%;
        max-height: 100px;
    }

    .list-unstyled {
        padding-left: 0;
        list-style: none;
        font-size: 1rem;
    }

    .card-title {
        color: #1e1b4b;
        font-weight: bold;
    }

    .btn-link {
        width: 100%;
        min-width: 120px;
        max-width: 180px;
        padding: .5rem;
        color: #fff;
        background-color: #c7d2fe;
        border-radius: 8px;
        text-decoration: none;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    }

    .btn-link:hover {
        color: #fff;
        background-color: #6366f1;
        cursor: pointer;
    }

    .gray-200 {
        color: #6b7280;
    }

    .card {
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .col-12.col-sm-8.p-0 {
        align-content: center;
    }
</style>
<div class="game-menu">
    <div class="title">
        <h2 style="color: #52555d;">
            <strong>เลือกบอส map</strong>
            <img class="p-0" src="https://forum.playragnarokonlinebr.com/uploads/emoticons/f4.gif" height="100">
        </h2>
    </div>
    <div class="border-bottom mb-3"></div>
    <div class="menu-list">
        <div class="row">
            @if ($boss)
                @foreach ($boss as $item)
                    <div class="col-12 col-lg-4 mb-3">
                        <div class="card border-0 p-4 text-start align-items-center justify-content-center text-center">
                            <img class="card-img-top" src="{{ $item->boss_pic }}" alt="Title"
                                style="width:79px;max-height:100px;" />
                            <div class="card-body p-0">
                                <label
                                    class="card-title p-2 px-4 rounded mb-3 text-uppercase">{{ $item->boss_name }}</label>
                                <div class="row justify-content-between mb-3">
                                    <div class="col-12 col-sm-8  p-0">
                                        <ul class="list-unstyled text-start">
                                            <li> <strong>เวลาเกิด : </strong> <label
                                                    class="gray-200">{{ $item->boss_revive ? $item->boss_revive : '' }}
                                                    นาที</label>
                                            </li>
                                            <li> <strong>เวลาเกิดดีเลย์ : </strong> <label
                                                    class="gray-200">{{ $item->boss_time_cooldown ? $item->boss_time_cooldown : '' }}
                                                    นาที</label>
                                                นาที</label>
                                            </li>
                                            <li> <strong>map : </strong> <label
                                                    class="gray-200">{{ $item->map_name ? $item->map_name : '' }}</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-sm-4 p-1">
                                        <img class="map-img shadow" src="{{ $item->map_pic ? $item->map_pic : '' }}">
                                    </div>
                                </div>

                                <div class="view-boss">
                                    <button type="button" class="btn w-100 btn-link">เลือก boss</button>
                                </div>
                            </div>
                        </div>


                    </div>
                @endforeach
            @endif

        </div>
    </div>

</div>

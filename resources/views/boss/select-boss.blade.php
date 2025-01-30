@extends('layout.app')
@section('title', 'BOT-TIMER')
@section('content')

    <style>
        .card {
            background-color: #eff6ff1a;
            backdrop-filter: blur(10px);
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
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
                                <div class="row">

                                    <ul>
                                        @if ($boss_all)
                                            @foreach ($boss_all as $item)
                                                <li>
                                                    {{ $item->boss_name ? $item->boss_name : '' }}
                                                </li>
                                            @endforeach

                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endsection

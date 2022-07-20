@extends('layouts.master')
@section('content')
    <div style="margin-right:1%;margin-left:1%">
        <div class="judul">
            <img src="{{ asset('img/infovaksin.png') }}" alt="Moeldepa" style="width: 25%;">
        </div>

        <div class="grid-list" style="align-items: center; justify-content: center">
            <!-- list 1 -->
            <div class="item-news">
                <iframe style="width: 100%;height: 90%;" src="https://www.youtube.com/embed/fpSEKmS8eeo">
                </iframe>
            </div>
            <!-- list 2 -->
            <div class="item-news">
                <iframe style="width: 100%;height: 90%;" src="https://www.youtube.com/embed/q7nR8dm-haE">
                </iframe>
            </div>
            <!-- list 3 -->
            <div class="item-news">
                <iframe style="width: 100%;height: 90%;" src="https://www.youtube.com/embed/JHOpubOCfuc">
                </iframe>
            </div>
            <!-- list 4 -->
            <div class="item-news">
                <iframe style="width: 100%;height: 90%;" src="https://www.youtube.com/embed/2OLNecMDsOM">
                </iframe>
            </div>
            <!-- list 5 -->
            <div class="item-news">
                <iframe style="width: 100%;height: 90%;" src="https://www.youtube.com/embed/HR4P8wnY0pY">
                </iframe>
            </div>

        </div>

        <div class="news-item-wraper" style="">
            <div>
                @foreach ($reviews as $review)
                    <div class="row">
                        <img src="{{ asset('img/covid-19-vac.png') }}" style="width: 15%;margin-left: 1%">
                        <div style="margin-left: 2%;margin-top: 0%">
                            <h2>
                                {{ $review->rumah_sakit }}
                            </h2>
                            <h4>
                                Website RS : <a href="{{ $review->url_rs }}"
                                    style="color: aqua">{{ $review->url_rs }}</a>
                            </h4>
                            <h4>
                                Tanggal Vaksin : {{ $review->tanggal_vaksin }}
                            </h4>
                            <h4>
                                Jenis Vaksin : {{ $review->jenis_vaksin }}
                            </h4>
                            <h4>
                                Kuota Vaksin : {{ $review->kuota }}
                            </h4>

                            <h4>
                                Informasi :
                                {{ $review->review }}
                            </h4>

                            <h4>
                                Asuransi :
                                @foreach ($review->tags as $tag)
                                    <img src="{{ asset('img/insurance.png') }}" style="width: 15px">
                                    {{ $tag->tag_name }}
                                @endforeach
                            </h4>
                            <h4>
                                Rating RS :
                                {{ $review->rating }}
                                <img src="{{ asset('img/ratestar.png') }}" style="width: 15px">
                            </h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection

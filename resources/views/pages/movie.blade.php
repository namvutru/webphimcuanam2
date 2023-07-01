@extends('namvutru')
@section('content')
<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <div class="yoast_breadcrumb hidden-xs"><span><span><a href="{{route('category',$movie->category->slug)}}">{{$movie->category->title}}</a> » <span><a href="{{route('country',$movie->country->slug)}}">{{$movie->country->title}}</a> » <span class="breadcrumb_last" aria-current="page">{{$movie->title}}</span></span></span></span></div>
                </div>
            </div>
        </div>
        <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
            <div class="ajax"></div>
        </div>
    </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
        <section id="content" class="test">
            <div class="clearfix wrap-content">

                <div class="halim-movie-wrapper">
                    <div class="title-block">
                        <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                            <div class="halim-pulse-ring"></div>
                        </div>
                        <div class="title-wrapper" style="font-weight: bold;">
                            Bookmark
                        </div>
                    </div>
                    <div class="movie_info col-xs-12">
                        <div class="movie-poster col-md-3">
                            <img class="movie-thumb" src="{{asset('uploads/movie/'.$movie->image)}}" alt="{{$movie->title}}">
                            <div class="bwa-content">
                                <div class="loader"></div>
                                <a href="{{route('watch')}}" class="bwac-btn">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>
                        </div>
                        <div class="film-poster col-md-9">
                            <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$movie->title}}</h1>
                            <h2 class="movie-title title-2" style="font-size: 12px;">{{$movie->title}}</h2>
                            <ul class="list-info-group">
                                <li class="list-info-group-item"><span>Trạng Thái</span> :
                                    <span class="quality">
                                        @if($movie->resolution==0)
                                            <td>HD</td>
                                        @elseif($movie->resolution==1)
                                            <td>SD</td>
                                        @elseif($movie->resolution==2)
                                            <td>CAM</td>
                                        @else
                                            <td>Full HD</td>
                                        @endif

                                    </span>
                                    <span class="episode">@if($movie->subtitle==1)
                                            <td>Thuyết minh</td>
                                        @else
                                            <td>Phụ đề</td>
                                        @endif
                                    </span></li>
                                <li class="list-info-group-item"><span>Điểm IMDb</span> : <span class="imdb">7.2</span></li>
                                <li class="list-info-group-item"><span>Thời lượng</span> : {{$movie->duration}}</li>
                                <li class="list-info-group-item"><span>Thể loại</span> : <a href="{{route('genre',$movie->genre->slug)}}" rel="tag">{{$movie->genre->title}}</a></li>
                                <li class="list-info-group-item"><span>Danh mục</span> : <a href="{{route('category',$movie->category->slug)}}" rel="tag">{{$movie->category->title}}</a></li>
                                <li class="list-info-group-item"><span>Quốc gia</span> : <a href="{{route('country',$movie->country->slug)}}" rel="tag">{{$movie->country->title}}</a></li>

                            <div class="movie-trailer hidden"></div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div id="halim_trailer"></div>
                <div class="clearfix"></div>
                <div class="section-bar clearfix">
                    <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                </div>
                <div class="entry-content htmlwrap clearfix">
                    <div class="video-item halim-entry-box">
                        <article id="post-38424" class="item-content">
                            {{$movie->description}}
                        </article>
                    </div>
                </div>
                <div class="section-bar clearfix">
                    <h2 class="section-title"><span style="color:#ffed4d">Tags phim</span></h2>
                </div>
                <div class="entry-content htmlwrap clearfix">
                    <div class="video-item halim-entry-box">
                        <article id="post-38424" class="item-content">
                            @php
                            $tags = explode(',',$movie->tags);
                            @endphp
                            @foreach($tags as $key=>$tag)
                                <a href="{{url('tag/'.$tag)}}">{{$tag}}</a>
                            @endforeach

                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="related-movies">
            <div id="halim_related_movies-2xx" class="wrap-slider">
                <div class="section-bar clearfix">
                    <h3 class="section-title"><span>CÓ THỂ BẠN CŨNG MUỐN XEM</span></h3>
                </div>
                <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                    @foreach($related as $key => $phimh)
                        <article class="thumb grid-item post-38494">
                            <div class="halim-item">
                                <a class="halim-thumb" href="{{route('movie',$phimh->slug)}}" title="{{$phimh->title}}">
                                    <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$phimh->image)}}" alt="Image Phim" title="Image Phim"></figure>
                                    <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> <div class="icon_overlay"></div>
                                    <div class="halim-post-title-box">
                                        <div class="halim-post-title ">
                                            <p class="entry-title">{{$phimh->title}}</p>
                                            <p class="original_title">{{$phimh->origintitle}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </article>
                    @endforeach


                </div>

            </div>

        </section>

    </main>

    @include('pages.include.sidebar')
</div>
@endsection

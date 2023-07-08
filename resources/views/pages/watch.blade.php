@extends('namvutru')
@section('content')
<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <div class="yoast_breadcrumb hidden-xs"><span><span><a href="{{route('country',$movie->country->slug)}}">{{$movie->country->title}}</a> » <span>
                                    @foreach($movie_genre as $key =>$movi_gen)

                                    <a href="{{route('genre',$movi_gen->genre->slug)}}">{{$movi_gen->genre->title}}</a> »

                                    @endforeach
                                    <span class="breadcrumb_last" aria-current="page">{{$movie->title}}</span></span></span></span></div>
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
                <style type="text/css"> .ifame-phim iframe {width:100%; height:500px; } </style>
                <div class="ifame-phim">
                    {!! $episode->linkphim !!}
                </div>
{{--                <div class="button-watch">--}}
{{--                    <ul class="halim-social-plugin col-xs-4 hidden-xs">--}}
{{--                        <li class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></li>--}}
{{--                    </ul>--}}
{{--                    <ul class="col-xs-12 col-md-8">--}}
{{--                        <div id="autonext" class="btn-cs autonext">--}}
{{--                            <i class="icon-autonext-sm"></i>--}}
{{--                            <span><i class="hl-next"></i> Autonext: <span id="autonext-status">On</span></span>--}}
{{--                        </div>--}}
{{--                        <div id="explayer" class="hidden-xs"><i class="hl-resize-full"></i>--}}
{{--                            Expand--}}
{{--                        </div>--}}
{{--                        <div id="toggle-light"><i class="hl-adjust"></i>--}}
{{--                            Light Off--}}
{{--                        </div>--}}
{{--                        <div id="report" class="halim-switch"><i class="hl-attention"></i> Report</div>--}}
{{--                        <div class="luotxem"><i class="hl-eye"></i>--}}
{{--                            <span>1K</span> lượt xem--}}
{{--                        </div>--}}
{{--                        <div class="luotxem">--}}
{{--                            <a class="visible-xs-inline" data-toggle="collapse" href="#moretool" aria-expanded="false" aria-controls="moretool"><i class="hl-forward"></i> Share</a>--}}
{{--                        </div>--}}
{{--                    </ul>--}}
{{--                </div>--}}
                <div class="collapse" id="moretool">
                    <ul class="nav nav-pills x-nav-justified">
                        <li class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></li>
                        <div class="fb-save" data-uri="" data-size="small"></div>
                    </ul>
                </div>

                <div class="clearfix"></div>
                <div class="clearfix"></div>
                <div class="title-block">
                    <a href="javascript:;" data-toggle="tooltip" title="Add to bookmark">
                        <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="37976">
                            <div class="halim-pulse-ring"></div>
                        </div>
                    </a>
                    <div class="title-wrapper-xem full">
                        <h1 class="entry-title"><a href="" title="{{$movie->title}}" class="tl">{{$movie->title}}</a></h1>
                    </div>
                </div>
                <div class="entry-content htmlwrap clearfix collapse" id="expand-post-content">
                    <article id="post-37976" class="item-content post-37976"></article>
                </div>
                <div class="clearfix"></div>
                <div class="text-center">
                    <div id="halim-ajax-list-server"></div>
                </div>
                <div id="halim-list-server">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active server-1"><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="hl-server"></i>
                                @if($movie->resolution==0)
                                    HD
                                @elseif($movie->resolution==1)
                                    SD
                                @elseif($movie->resolution==2)
                                    CAM
                                @elseif($movie->resolution==3)
                                    Full HD
                                @else
                                    Trailer
                                @endif
                            </a></li>

                        <li role="presentation" class="active server-1"><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="hl-server"></i>
                                @if($movie->subtitle==0)
                                    Phụ đề
                                @else
                                    Thuyết minh
                                @endif
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active server-1" id="server-0">
                            <div class="halim-server">
                                <ul class="halim-list-eps">
                                    @if($movie->sumepisode!=1)
                                    @foreach($list_episode as $key => $epi)
                                        @if($episode->episode==$epi->episode)
                                        <a href="{{url('/xem-phim/'.$movie->slug.'/tap-'.$epi->episode)}}"><li class="halim-episode"><span class="halim-btn halim-btn-2 active halim-info-1-1 box-shadow" data-post-id="37976" data-server="1" data-episode="1" data-position="first" data-embed="0" data-title="{{$movie->title}} - Tập {{$epi->episode}} - {{$movie->origintitle}} - vietsub + Thuyết Minh" data-h1="{{$movie->title}} - Tập {{$epi->episode}}">{{$epi->episode}}</span></li></a>
                                        @else
                                            <a href="{{url('/xem-phim/'.$movie->slug.'/tap-'.$epi->episode)}}"><li class="halim-episode"><span class="halim-btn halim-btn-2 halim-info-1-1 box-shadow" data-post-id="37976" data-server="1" data-episode="1" data-position="first" data-embed="0" data-title="{{$movie->title}} - Tập {{$epi->episode}} - {{$movie->origintitle}} - vietsub + Thuyết Minh" data-h1="{{$movie->title}} - Tập {{$epi->episode}}">{{$epi->episode}}</span></li></a>

                                        @endif
                                    @endforeach
                                    @endif
{{--


{{--                                    <a href="{{route('episode')}}"><li class="halim-episode"><span class="halim-btn halim-btn-2 halim-info-1-2 box-shadow" data-post-id="37976" data-server="1" data-episode="2" data-position="" data-embed="0" data-title="Xem phim Tôi Và Chúng Ta Ở Bên Nhau - Tập 2 - Be Together - vietsub + Thuyết Minh" data-h1="Tôi Và Chúng Ta Ở Bên Nhau - tập 2">2</span></li></a>--}}

                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="htmlwrap clearfix">
                    <div id="lightout"></div>
                </div>
            </div>
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
            <div class="section-bar clearfix">
                <h2 class="section-title"><span style="color:#ffed4d">Đánh giá</span></h2>
            </div>
            <div class="entry-content htmlwrap clearfix">
                <div class="video-item halim-entry-box">
                    <article id="post-38424" class="item-content">
                        @php
                            $current_url= Request::url();
                        @endphp

                        <div style="background-color:#FFFFFF;" class="fb-comments" data-href="{{$current_url}}"  data-width="" data-colorscheme="light" data-numposts="10"></div>
                    </article>
                </div>
            </div>
        </section>

    </main>
    @include('pages.include.sidebar')
</div>
@endsection

@extends('namvutru')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span>Phim theo tag:
                                    <a href="">{{$tag}}</a>
                                </span></span></div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section>
                <div class="section-bar clearfix">
                    <h1 class="section-title"><span>TAG: {{$tag}}</span></h1>
                </div>
                <div class="halim_box">
                    @foreach($movie as $key => $movi)
                        <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                            <div class="halim-item">
                                <a class="halim-thumb" href="{{route('movie',$movi->slug)}}" title="{{$movi->title}}">
                                    <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$movi->image)}}" alt="VŨNG LẦY PHẦN 1" title="VŨNG LẦY PHẦN 1"></figure>
                                    <span class="status">
                                @if($movi->resolution==0)
                                            HD
                                        @elseif($movi->resolution==1)
                                            SD
                                        @elseif($movi->resolution==2)
                                            CAM
                                        @else
                                            Full HD
                                        @endif
                            </span>
                                    <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span>
                                    <div class="icon_overlay"></div>
                                    <div class="halim-post-title-box">
                                        <div class="halim-post-title ">
                                            <p class="entry-title">{{$movi->title}}</p>
                                            <p class="original_title">{{$movi->origintitle}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </article>
                    @endforeach

                </div>
                <div class="clearfix"></div>
                <div class="text-center">
                    {!!$movie->links("pagination::bootstrap-4")!!}
                </div>
            </section>
        </main>
        @include('pages.include.sidebar')
    </div>
@endsection

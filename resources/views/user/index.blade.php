@extends('dashboardLayout')

@section('title')
    <title>Home</title>
@stop

@section('content')

{{-- http://bootstrap.snipplicious.com/snippet/6/comments --}}
<style type="text/css">

    .comments .media-heading {
        margin-top: 25px;
    }

    .comments .comment-info {
        margin-left: 6px;
        margin-top: 21px;
    }

    .comments .comment-info .btn {
        font-size: 0.8em;
    }

    .comments .comment-info .fa {
        line-height: 10px;
    }

    .comments .media-body p {
        position: relative;
        background: #F7F7F7;
        padding: 15px;
        margin-top: 50px;
    }

    .comments .media-body p::before {
        background-color: #F7F7F7;
        box-shadow: -2px 2px 2px 0 rgba( 178, 178, 178, .4 );
        content: "\00a0";
        display: block;
        height: 30px;
        left: 20px;
        position: absolute;
        top: -13px;
        transform: rotate( 135deg );
        width:  30px;
    }

    .white {
        color: #fff;
    }

</style>

<div id="page-wrapper">
    <div class="container-fluid">
        
                <!-- 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12 breadcrumb quote">
                            <h4><em>"{{ Inspiring::quote() }}"</em></h4>
                        </div>   
                        <div class="page-header"></div>
                    </div>
                </div>
                -->

                
                <div class="row">
                    <div class="col-lg-9">
                        <?php $count = count($data,0)?>
                        @if($data)
                            @foreach( array_reverse($data) as $entry)
                            {{--http://bootstrap.snipplicious.com/snippet/6/comments--}}
                            <div class="row">
                              <div class="col-lg-12">
                                <ul class="media-list comments">
                                  <li class="media">
                                    <a class="pull-left" href="#">
                                    <!--http://lorempixel.com/ random profile pics-->
                                    <img class="media-object img-circle img-thumbnail" src="http://lorempixel.com/64/64/people/{{$count}}" width="64" alt="random picture courtesy of lorempixel">
                                    <?php $count=rand(1,9);?>   
                                    </a>
                                    <div class="media-body">
                                      <h5 class="media-heading pull-left">{{$entry->username}}</h5>
                                      <div class="comment-info pull-left">
                                        <div class="btn btn-default btn-xs disabled"><i class="fa fa-clock-o"></i> Recommended on {{$entry->recommended_date}}</div>
                                      </div>
                                      <br class="clearfix">
                                      <p class="well">
                                        I love 
                                            @if($entry->track_name)
                                                the melody titled
                                                "<a href="/track/{{$entry->track_id}}/details/">
                                                    {{$entry->track_name}}
                                                </a>"
                                            @endif
                                            @if($entry->artist_name)
                                                by
                                                <a href="/artist/{{$entry->artist_id}}/details/">
                                                    {{$entry->artist_name}}
                                                </a>
                                            @endif
                                            @if($entry->album_name)
                                                from the album 
                                                <a href="/album/{{$entry->album_id}}/details/">
                                                    {{$entry->album_name}}
                                                </a>~
                                            @endif
                                      </p> 
                                    </div>
                                  </li>
                                </ul>
                                <hr>
                              </div>
                            </div>
                            @endforeach
                        @else
                            <h1> No recommendations yet, <a href="/track/recommend">recommend</a> melodies now! </h1>
                        @endif
                    </div>
                </div>
                <!-- /.row -->




    </div>
</div>

@stop


@extends('layouts.app')

@section('content')
    <div id="wrap_all">

    <div class="dashboard chap_container" >
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">خانه</a></li>
                <li class="breadcrumb-item active">بنر مناسبتی</li>
                <li class="breadcrumb-item active" aria-current="page">ترحیم و تسلیت</li>
            </ol>
        </nav>

        <div class=" blog-page">
            <div class="col-md-12 row">
                @foreach($banners as $banner)

                    <div class="col-sm-12 col-md-4 col-lg-4 mb-2">
                        <div class="card hovercard">
                            <div class="cardheader" style="background-size: cover !important;background: url(/{{ $banner->image }})">

                            </div>
                            <div class="avatar">
                                <img alt="" src="/img/logo1.png">
                            </div>
                            <div class="info">
                                <div class="title">
                                    <span>{{ $banner->name ?: $banner->title }}</span>
                                </div>

                            </div>
                            <div class="bottom">
                                @if($banner->name)
                                <a style="width: 100%" class="btn btn-primary btn-twitter btn-lg" href="{{ route('banner',$banner->slug) }}">
                                    مشاهده
                                </a>
                                    @else
                                    <a style="width: 100%" class="btn btn-primary btn-twitter btn-lg" href="{{ route('banners',$banner->slug) }}">
                                        مشاهده
                                    </a>

                                @endif
                            </div>
                        </div>

                    </div>

                @endforeach
            </div>
            <div style="height: 50px;display: block"></div>

        </div>
    </div>
    </div>
    <style>

        .card {
            padding-top: 20px;
            margin: 10px 0 20px 0;
            background-color: rgba(214, 224, 226, 0.2);
            border-top-width: 0;
            border-bottom-width: 2px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .card .card-heading {
            padding: 0 20px;
            margin: 0;
        }

        .card .card-heading.simple {
            font-size: 20px;
            font-weight: 300;
            color: #777;
            border-bottom: 1px solid #e5e5e5;
        }

        .card .card-heading.image img {
            display: inline-block;
            width: 46px;
            height: 46px;
            margin-right: 15px;
            vertical-align: top;
            border: 0;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .card .card-heading.image .card-heading-header {
            display: inline-block;
            vertical-align: top;
        }

        .card .card-heading.image .card-heading-header h3 {
            margin: 0;
            font-size: 14px;
            line-height: 16px;
            color: #262626;
        }

        .card .card-heading.image .card-heading-header span {
            font-size: 12px;
            color: #999999;
        }

        .card .card-body {
            padding: 0 20px;
            margin-top: 20px;
        }

        .card .card-media {
            padding: 0 20px;
            margin: 0 -14px;
        }

        .card .card-media img {
            max-width: 100%;
            max-height: 100%;
        }

        .card .card-actions {
            min-height: 30px;
            padding: 0 20px 20px 20px;
            margin: 20px 0 0 0;
        }

        .card .card-comments {
            padding: 20px;
            margin: 0;
            background-color: #f8f8f8;
        }

        .card .card-comments .comments-collapse-toggle {
            padding: 0;
            margin: 0 20px 12px 20px;
        }

        .card .card-comments .comments-collapse-toggle a,
        .card .card-comments .comments-collapse-toggle span {
            padding-right: 5px;
            overflow: hidden;
            font-size: 12px;
            color: #999;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .card-comments .media-heading {
            font-size: 13px;
            font-weight: bold;
        }

        .card.people {
            position: relative;
            display: inline-block;
            width: 170px;
            height: 300px;
            padding-top: 0;
            margin-left: 20px;
            overflow: hidden;
            vertical-align: top;
        }

        .card.people:first-child {
            margin-left: 0;
        }

        .card.people .card-top {
            position: absolute;
            top: 0;
            left: 0;
            display: inline-block;
            width: 170px;
            height: 150px;
            background-color: #ffffff;
        }

        .card.people .card-top.green {
            background-color: #53a93f;
        }

        .card.people .card-top.blue {
            background-color: #427fed;
        }

        .card.people .card-info {
            position: absolute;
            top: 150px;
            display: inline-block;
            width: 100%;
            height: 101px;
            overflow: hidden;
            background: #ffffff;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .card.people .card-info .title {
            display: block;
            margin: 8px 14px 0 14px;
            overflow: hidden;
            font-size: 16px;
            font-weight: bold;
            line-height: 18px;
            color: #404040;
        }

        .card.people .card-info .desc {
            display: block;
            margin: 8px 14px 0 14px;
            overflow: hidden;
            font-size: 12px;
            line-height: 16px;
            color: #737373;
            text-overflow: ellipsis;
        }

        .card.people .card-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            display: inline-block;
            width: 100%;
            padding: 10px 20px;
            line-height: 29px;
            text-align: center;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .card.hovercard:hover {
            box-shadow: 0 1px 3px 1px rgba(66, 66, 66, 0.2), 0 2px 8px 4px rgba(66, 66, 66, 0.1);

        }
        .card.hovercard {
            transition: box-shadow 135ms 0ms cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 1px 1px 0 rgba(66, 66, 66, 0.08), 0 1px 3px 1px rgba(66, 66, 66, 0.16);
            transition: width 235ms 0ms cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            padding-top: 0;
            overflow: hidden;
            text-align: center;
            background-color: rgba(214, 224, 226, 0.2);
        }

        .card.hovercard .cardheader {
            background-size: cover;
            height: 250px;
        }
        .card.hovercard span {
            font-size: 20px;
            color: #443f3f;
            padding: 10px 0;
            display: block;
        }
        .card.hovercard .avatar {
            position: relative;
            top: -50px;
            margin-bottom: -50px;
        }

        .card.hovercard .avatar img {
            width: 120px;
            height: 120px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            border: 5px solid rgba(255,255,255,0.5);
            background: #666;
        }

        .card.hovercard .info {
            padding: 4px 8px 10px;
        }

        .card.hovercard .info .title {
            margin-bottom: 4px;
            font-size: 24px;
            line-height: 1;
            color: #262626;
            vertical-align: middle;
        }

        .card.hovercard .info .desc {
            overflow: hidden;
            font-size: 12px;
            line-height: 20px;
            color: #737373;
            text-overflow: ellipsis;
        }

        .card.hovercard .bottom {
            padding: 0 20px;
            margin-bottom: 17px;
        }






        .card-block {
            position: absolute;
          /*  background: #00000080;
            background: linear-gradient( 45deg, rgba(29, 236, 197, 0.5), rgba(91, 14, 214, 0.5) 100% );
            background: linear-gradient(40deg,#ffd86f,#fc6262) !important;
            background: linear-gradient(40deg,#ff6ec4,#7873f5) !important; */
            background: linear-gradient(45deg,#000850 0%,#000320 100%), radial-gradient(100% 225% at 100% 0%,#FF6928 0%,#000000 100%), linear-gradient(225deg,#FF7A00 0%,#000000 100%), linear-gradient(135deg,#CDFFEB 10%,#CDFFEB 35%,#009F9D 35%,#009F9D 60%,#07456F 60%,#07456F 67%,#0F0A3C 67%,#0F0A3C 100%);
            background-blend-mode: screen, overlay, hard-light, normal;
            height: 100%;
            width: 100%;
            top: 105%;
            -webkit-transition: all 500ms ease-in-out;
            -moz-transition: all 500ms ease-in-out;
            -ms-transition: all 500ms ease-in-out;
            -o-transition: all 500ms ease-in-out;
            transition: all 500ms ease-in-out;
            color: #fff;
        }
        .card--z-:hover .card-block {
            top: 0;
        }

.card{
    overflow: hidden;
}
        .card-footer {
            padding: 0.75rem 1.25rem;
            background-color: rgba(0, 0, 0, 0.03);
            border-top: 1px solid rgba(0, 0, 0, 0.125);
            z-index: 99;
            background: #fff;
        }
    </style>
@endsection

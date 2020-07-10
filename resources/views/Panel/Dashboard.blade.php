@extends('Layout.Panel')

@section('content')
<div class="container-fluid boxShadow p-5">

    <div class="row justify-content-center">
        <div class="col-lg-3 col-sm-6 my-3">
            <a href="#">
                <div class="small-box" style="padding: 20px;
                    box-shadow: 0 6px 20px 0 #71ec62 !important;
                    background: linear-gradient(-45deg,#2a9c05,#71ec62)!important;                    color: #fff;
                    border-radius: 7px;">
                    <div class="inner">
                        <h3 style="color: white !important;">1<sup style="font-size: 20px"></sup>
                        </h3>
                        <p class="text-white fs-1-5">انیمیشن </p>
                    </div>
                    <div class="fs-2">
                        <i class="fas fa-2x fa-radiation-alt"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 my-3">
            <a href="#">
                <div class="small-box" style="padding: 20px;
                    box-shadow: 0 6px 20px 0 #bb52e6!important;
                    background: linear-gradient(-45deg,#70059c,#bb52e6)!important;
                    color: #fff;
                    border-radius: 7px;">
                    <div class="inner">
                        <h3 style="color: white !important;">1<sup style="font-size: 20px"></sup>
                        </h3>
                        <p class="text-white fs-1-5">انیمیشن </p>
                    </div>
                    <div class="fs-2">
                        <i class="fas fa-2x fa-radiation-alt"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 my-3">
            <a href="#">
                <div class="small-box" style="padding: 20px;
                    box-shadow: 0 6px 20px 0 #f971a3 !important;
                    background: linear-gradient(-45deg,#de0067,#f1689a)!important;                   color: #fff;
                    border-radius: 7px;">
                    <div class="inner">
                        <h3 style="color: white !important;">1<sup style="font-size: 20px"></sup>
                        </h3>
                        <p class="text-white fs-1-5">انیمیشن </p>
                    </div>
                    <div class="fs-2">
                        <i class="fas fa-2x fa-radiation-alt"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 my-3">
            <a href="#">
                <div class="small-box" style=" padding: 20px;
                    box-shadow: 0 6px 20px 0 rgba(255, 53, 19, 0.5)!important;
                    background: linear-gradient(-45deg,#9c1405,#e91d26)!important;
                    color: #fff;
                    border-radius: 7px;">
                    <div class="inner">
                        <h3 style="color: white !important;">1<sup style="font-size: 20px"></sup>
                        </h3>
                        <p class="text-white fs-1-5">انیمیشن </p>
                    </div>
                    <div class="fs-2">
                        <i class="fas fa-2x fa-radiation-alt"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <canvas id="visits" width="400" height="400"></canvas>

        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <canvas id="fileschart" width="400" height="400"></canvas>

        </div>
    </div>




</div>


@endsection
@section('js')
<script src="{{asset('assets/js/charts.js')}}"></script>

@endsection
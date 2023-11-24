@extends('layouts.master')
@section('contain')
<!-- row page titles -->
<!-- ============================================================== -->
<div class="row page-titles" >
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                {{-- <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li> --}}
                {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
            </ol>
            {{-- <a href="" }}"><button type="button"
                class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create
                New</button></a> --}}
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End row page titles -->
    <div class="row">
    <!-- column -->
    <div class="col-lg-6 col-md-6">
        <!-- Card -->
        <div class="card text-center" style="box-shadow: 0px 0px 14px 3px #cfcfcf;">
            {{-- <img class="card-img-top img-responsive" src="../assets/images/big/img1.jpg" alt="Card image cap"> --}}
            <div class="card-body  " class="text-centar" style="background: linear-gradient(45deg, rgb(243, 221, 192), transparent);border: 1px solid #cdcdcd;">
                <h4 class="card-subtitle">Users</h4>

                <a href="{{Route('user.list')}}" class="btn-outline-cyan">
                    <p class="card-text "style="margin-top: -1%;">Total Users</p>
                    <h2 class="card-title">{{$countData['user']}}
                    </h2>
                </div>
            </div>
        </a>
        <!-- Card -->
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card text-center" style="box-shadow: 0px 0px 14px 3px #cfcfcf;">
            <div class="card-body  " class="text-centar" style="background: linear-gradient(45deg, rgb(243, 198, 198), transparent);border: 1px solid #cdcdcd;">
                <h4 class="card-subtitle">General Donation</h4>
                <a href="{{Route('generaldonation.index')}}" class="btn-outline-cyan">
                    <p class="card-text"style="margin-top: -1%;">Total General Donation</p>
                    <h2 class="card-title">{{$countData['general_donation']}}</h2>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card text-center" style="box-shadow: 0px 0px 14px 3px #cfcfcf;">
            <div class="card-body  " class="text-centar" style="background: linear-gradient(45deg, rgb(243, 198, 198), transparent);border: 1px solid #cdcdcd;">
                <h4 class="card-subtitle">Donations</h4>
                <a href="{{Route('donation.index')}}" class="btn-outline-cyan">
                    <p class="card-text"style="margin-top: -1%;">Total Donations</p>
                    <h2 class="card-title">{{$countData['donations']}}</h2>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card text-center" style="box-shadow: 0px 0px 14px 3px #cfcfcf;">
            <div class="card-body  " class="text-centar" style="background: linear-gradient(45deg, rgb(243, 221, 192), transparent);border: 1px solid #cdcdcd;">
                <h4 class="card-subtitle">Victim</h4>

                <a href="{{Route('victim.index')}}" class="btn-outline-cyan">
                    <p class="card-text "style="margin-top: -1%;">Total Victim</p>
                    <h2 class="card-title">{{$countData['victim']}}
                    </h2>
                </div>
            </div>
        </a>
    </div>

    </div>
@endsection

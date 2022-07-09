@extends('layouts.template')

@section("content")
<div class="page-content">
    <h3 class="text-center">My Balance</h3>
    <p></p>
                <section class="row">
                    @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <section class="section">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-4">
                        <div class="card">
                            <div class="card-header text-center"><h5>Cash</h5><hr></div>
                            <div class="card-body">
                            @foreach($cash as $item)
                            <div class="alert alert-info alert-with-icon" data-notify="container">
                            <span data-notify="message">
                            <a style="font-size: 15px">Amount</a>
                            <p>
                            <strong>IDR. {{$item->saldo_akhir}},-
                            </p></strong>
                            </span>
                            <div class="text-right">
                            <a href="{{route ('balance.cashdetail')}}" type="button" class="btn btn-primary" method="post">
                            <i class="bi bi-receipt"></i>
                                    </a>
                            <a href="{{route ('balance.usertransfer')}}" type="button" class="btn btn-info">
                                <i class="bi bi-arrow-left-right" ></i> 
                                </a>
                                <a href="{{route ('balance.userwithdraw')}}" type="button "class="btn btn-warning">
                                <i class="bi bi-cash"></i>
                                </a>
                            </div>
                            </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-header text-center"><h5>RSU</h5><hr></div>

                <div class="card-body">
                @foreach($rsu as $item)
                <div class="alert alert-info alert-with-icon" data-notify="container">
                <span data-notify="message">
                <a style="font-size: 15px">Amount</a>
                <p>
                <strong>{{$item->saldo_akhir}} Unit
                </p></strong>
                </span>
                <div class="text-right">
                <a href="{{route ('balance.rsudetail')}}" type="button" class="btn btn-primary" method="post">
                <i class="bi bi-receipt"></i>
                        </a>
                <a href="{{route ('balance.usertransferrsu')}}" type="button" class="btn btn-info">
                <i class="bi bi-arrow-left-right" ></i> 
                    </a>
                    <a href="{{route ('balance.userwithdrawrsu')}}" type="button "class="btn btn-warning">
                    <i class="bi bi-cash"></i>
                    </a>
                </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>

@endsection
@extends('layouts.template')

@section("content")
<section id="basic-horizontal-layouts">
                    <div class="row match-height justify-content-center">
                        <div class="col-md-9 col-12">
@if (session('status'))
            <div class="alert alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('status') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                <h5 class="title text-center">Your Cash Balance</h5>
                </div>
                <div class="card-body">
                    @foreach($cash as $item)
                    @if($item->transaksi=='withdraw')
                <div class="alert alert-danger alert-with-icon" data-notify="container">
                    @endif
                    @if($item->transaksi=='deposit')
                <div class="alert alert-success alert-with-icon" data-notify="container">
                    @endif
                    @if($item->transaksi=='transfer')
                <div class="alert alert-info alert-with-icon" data-notify="container">
                    @endif
                    @if($item->transaksi=='recieve')
                <div class="alert alert-info alert-with-icon" data-notify="container">
                    @endif
                <div class="text-right">
                    <a href="#" class="btn btn-info btn-sm">
                        {{$item->transaksi}}
                        </a>
                </div>
                <span data-notify="message">
                <a style="font-size: 15px">Transaction Amount: IDR. {{$item->jumlah_transaksi}}</a>
                @if($item->transaksi=='transfer')
                <!-- <p style="font-size: 15px">Reciever: {{$item->user->name}}</p> -->
                @endif
                <p>Total Cash:
                <strong>IDR. {{$item->saldo_akhir}}
                </p></strong>
                
                </span>
                <div class="text-left">
                @if($item->status=='success')
                <a href="#" class="btn btn-success btn-sm">
                {{$item->status}}
                        </a>
                @endif
                @if($item->status=='pending')
                <a href="#" class="btn btn-warning btn-sm">
                {{$item->status}}
                        </a>
                @endif
                </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
        @endsection
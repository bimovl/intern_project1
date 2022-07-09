@extends('layouts.templateadmin')

@section("content")
@if (session('status'))
            <div class="alert alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('status') }}
            </div>
            @endif
            <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title text-center"> Balance RSU's</h5><hr>
                        </div>
              
            <div class="card-body">
            <div class="text-left">
              <a href="{{route('balance.addrsu')}}" class="btn btn-success btn-sm">
              <i class="bi bi-plus-lg"></i> Add Transaction
            </a>
            </div>
            <p></p>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No </th>
                        <th>Name </th>
                        <th>Transaction Amount</th>
                        <th>Type</th>
                        <th>Total Units</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($rsu as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->user->name}} {{$item->user->lastname}} </td>
                        <td> {{$item->jumlah_transaksi}} Unit</td>
                        <td> {{$item->transaksi}} </td>
                        <td> {{$item->saldo_akhir}} Unit</td>
                        @if($item->status=='success')
                        <td> <a class="badge bg-success">{{$item->status}}</a> </td>
                        @endif
                        @if($item->status=='pending')
                        <td> <a class="badge bg-warning">{{$item->status}}</a> </td>
                        @endif
                        <td class="text-center">  
                        <a href="/balance/depositrsu/{{$item['id']}}" class="btn btn-success btn-sm" method="post">
                        <i class="bi bi-wallet2"></i>
                            </a>
                        <a href="/balance/withdrawrsu/{{$item['id']}}" class="btn btn-warning btn-sm" method="post">
                        <i class="bi bi-cash"></i>     
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
             
        </div>
        </div>
        </div>

        </div>
        
    @endsection
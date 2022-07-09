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
                            <h5 class="title text-center"> Balance Cash</h5><hr>
                        </div>
              
            <div class="card-body">
            <div class="text-left">
              <a href="{{route('balance.addcash')}}" class="btn btn-success btn-sm">
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
                        <th>Total Cashes</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cash as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->user->name}}</td>
                        <td> IDR. {{$item->jumlah_transaksi}},- </td>
                        <td> {{$item->transaksi}} </td>
                        <td> IDR. {{$item->saldo_akhir}},- </td>
                        @if($item->status=='success')
                        <td> <span class="badge bg-success">{{$item->status}}</span> </td>
                        @endif
                        @if($item->status=='pending')
                        <td> <span class="badge bg-warning">{{$item->status}}</span> </td>
                        @endif
                        <td class="text-center">  
                        <a href="/balance/depositcash/{{$item['id']}}" class="btn btn-success btn-sm" method="post">
                        <i class="bi bi-wallet2"></i>
                        
                        <a href="/balance/withdrawcash/{{$item['id']}}" class="btn btn-warning btn-sm" method="post">
                            <i class="bi bi-cash"></i>      
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
        </div>
</section>
        </div>
        </div>
        
    @endsection
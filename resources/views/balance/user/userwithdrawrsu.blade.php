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
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
        <div class="card justify-content">
            <div class="card-header">
                <h5 class="title text-center"> Withdraw RSU </h5><hr>
              </div>
              
            <div class="card-body">
            <form method="post" action="{{route('balance.storersu')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">RSU Balance :</label>

                            <div class="col-md-6">
                                @foreach($rsu as $item)
                            <p>{{$item->saldo_akhir}} Unit </p>
                            <input type="hidden" name="id" value="{{$item['id']}}">
                            <input type="hidden" name="user_id" value="{{$item['user_id']}}">
                            <input id="saldo_awal" type="hidden" onkeyup="sum();" class="form-control @error('saldo_awal') is-invalid @enderror" name="saldo_awal" value="{{$item['saldo_akhir']}}">
                                @error('saldo_awal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endforeach
                        <div class="form-group row">
                            <label for="jumlah_transaksi" class="col-md-4 col-form-label text-md-right">Transaction Amount :</label>
                            <div class="col-md-6">
                            <input type="hidden" name="transaksi" value="withdraw">
                                <input type="hidden" name="status" value="pending">
                                <input id="jumlah_transaksi" type="number" onkeyup="sum();" class="form-control @error('jumlah_transaksi') is-invalid @enderror" name="jumlah_transaksi">
                                @error('jumlah_transaksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @foreach($rsu as $item)
                        <div class="form-group row" hidden="form-group row">
                            <label for="saldo_akhir" class="col-md-4 col-form-label text-md-right">Total RSU Balance :</label>
                            <div class="col-md-6">
                            <input id="saldo_akhir" type="number" onkeyup="sum();" class="form-control @error('saldo_akhir') is-invalid @enderror" name="saldo_akhir" readonly>
                                @error('saldo_akhir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endforeach
                        <div class="form-group row" hidden="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">Status :</label>
                        <div class="col-md-6">
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required autocomplete="status" autofocus >
                                    <option value="pending"> Pending</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to withdraw your RSU balance?')" >
                                    Withdraw
                                </button>
                            </div>
                        </div>
            </form>
            </div>
        </div>
        
</div>
<script>
                            function sum(){
                                var txtFirstNumberValue = document.getElementById('saldo_awal').value;
                                var txtSecondNumberValue = document.getElementById('jumlah_transaksi').value;
                                var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
                                    if (!isNaN(result)){
                                        document.getElementById('saldo_akhir').value = result;
                                    }
                            }
                        </script>

@endsection
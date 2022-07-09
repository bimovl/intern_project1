@extends('layouts.templateadmin')
@section("content")
<section id="basic-horizontal-layouts">
                    <div class="row match-height justify-content-center">
                        <div class="col-md-10 col-12">
@if (session('status'))
                        <div class="alert alert-success" role="alert">
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
                <h5 class="title text-center"> Withdraw Cash {{ $cash->user->name }} {{ $cash->user->last_name }}</h5><hr>
              </div>
              
            <div class="card-body">
            <form method="post" action="{{route('balance.updatewithdrawcash')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row" hidden="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Saldo :</label>

                            <div class="col-md-6">
                            <input  name="id" value="{{$cash['id']}}">
                            <input  name="user_id" value="{{$cash['user_id']}}">
                                <input id="saldo_awal" type="hidden" onkeyup="sum();" class="form-control @error('saldo_awal') is-invalid @enderror" name="saldo_awal" value="{{$cash['saldo_awal']}}">
                                @error('saldo_awal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah_transaksi" class="col-md-4 col-form-label text-md-right">Nominal Transaksi :</label>
                            <div class="col-md-6">
                            <input type="hidden" name="transaksi" value="withdraw">
                                <input id="jumlah_transaksi" type="number" onkeyup="sum();" class="form-control @error('jumlah_transaksi') is-invalid @enderror" name="jumlah_transaksi" value="{{$cash['jumlah_transaksi']}}">
                                @error('jumlah_transaksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="saldo_akhir" class="col-md-4 col-form-label text-md-right">Saldo Akhir :</label>
                            <div class="col-md-6">
                                <input id="saldo_akhir" type="number" onkeyup="sum();" class="form-control @error('saldo_akhir') is-invalid @enderror" name="saldo_akhir" value="{{$cash['saldo_akhir']}}" readonly>
                                @error('saldo_akhir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">Status :</label>
                        <div class="col-md-6">
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required autocomplete="status" autofocus >
                                    <option value="pending"> pending</option>
                                    <option value="success"> success</option>
                                    
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
                                <button type="submit" class="btn btn-success">
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
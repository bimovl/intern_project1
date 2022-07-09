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
                <h5 class="title text-center"> Deposit RSU {{ $rsu->user->name }} {{ $rsu->user->last_name }}</h5><hr>
              </div>
              
            <div class="card-body">
            <form method="post" action="{{route('balance.storersu')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Unit Balance :</label>

                            <div class="col-md-6">
                            <p>Rp. {{$rsu->saldo_akhir}},- </p>
                            <input type="hidden" name="id" value="{{$rsu['id']}}">
                            <input type="hidden" name="user_id" value="{{$rsu['user_id']}}">
                                <input id="saldo_awal" onkeyup="sum();" type="hidden" class="form-control @error('saldo_awal') is-invalid @enderror" name="saldo_awal" value="{{$rsu['saldo_akhir']}}">
                                @error('saldo_awal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah_transaksi" class="col-md-4 col-form-label text-md-right">Transaction Amount:</label>
                            <div class="col-md-6">
                            <input type="hidden" name="transaksi" value="deposit">
                                <input type="hidden" name="status" value="success">
                                <input id="jumlah_transaksi" onkeyup="sum();" type="number" class="form-control @error('jumlah_transaksi') is-invalid @enderror" name="jumlah_transaksi">
                                @error('jumlah_transaksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="saldo_akhir" class="col-md-4 col-form-label text-md-right">Total Balance:</label>
                            <div class="col-md-6">
                                <input id="saldo_akhir" type="number" onkeyup="sum();" class="form-control @error('saldo_akhir') is-invalid @enderror" name="saldo_akhir" required autocomplete="saldo_akhir" readonly>
                                @error('saldo_akhir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Deposit
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
                                var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
                                    if (!isNaN(result)){
                                        document.getElementById('saldo_akhir').value = result;
                                    }
                            }
                        </script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
@endsection
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
                <h5 class="title text-center"> Add Transaction</h5><hr>
              </div>
              
            <div class="card-body">
            <form method="post" action="{{route('balance.storecash')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                        <label for="user_id" class="col-md-4 col-form-label text-md-right">User</label>
                        <div class="col-md-6">
                            <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror" required autocomplete="user_id" autofocus >
                            <option>-- Choose User --</option>
                                    @foreach ($user as $item)
                                    <option value="{{ $item->id }}"> {{ $item->email }}</option>
                                    @endforeach
                            </select>
                            @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>

                        <div class="form-group row" hidden="form-group row">
                            <label for="saldo_awal" class="col-md-4 col-form-label text-md-right">Beginning Saldo</label>

                            <div class="col-md-6">
                            <p>Rp. 0,- </p>
                                <input type="hidden" name="transaksi" value="deposit">
                                <input type="hidden" id="saldo_awal" onkeyup="sum();" class="form-control @error('saldo_awal') is-invalid @enderror" name="saldo_awal" value="0">
                                @error('saldo_awal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jumlah_transaksi" class="col-md-4 col-form-label text-md-right">First Transaction :</label>
                            <div class="col-md-6">
                                <input type="hidden" name="status" value="success">
                                <input id="jumlah_transaksi" onkeyup="sum();" type="text" class="form-control @error('jumlah_transaksi') is-invalid @enderror" name="jumlah_transaksi" required autocomplete="jumlah_transaksi" autofocus>
                                @error('jumlah_transaksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="saldo_akhir" class="col-md-4 col-form-label text-md-right">Total Cash Balance :</label>
                            <div class="col-md-6">
                                <input id="saldo_akhir" type="text" onkeyup="sum();" class="form-control @error('saldo_akhir') is-invalid @enderror" name="saldo_akhir" required autocomplete="saldo_akhir" autofocus readonly>
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
                                    Save
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
@endsection
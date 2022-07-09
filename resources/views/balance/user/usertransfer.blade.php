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
        <div class="card justify-content-center">
            <div class="card-header">
                <h5 class="title text-center"> Cash Transfer</h5><hr>
              </div>
              
            <div class="card-body">
            <form method="post" action="{{route('balance.storecash')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Cash Balance :</label>

                            <div class="col-md-6">
                            @foreach($cash as $item)
                            <p>IDR. {{$item->saldo_akhir}},- </p>
                            <input type="hidden" name="id" value="{{$item['id']}}">
                            <input type="hidden" name="user_id" value="{{$item['user_id']}}">
                                <input id="saldo_awal" type="hidden" onkeyup="sum();" class="disable form-control @error('saldo_awal') is-invalid @enderror" name="saldo_awal" value="{{$item['saldo_akhir']}}" >
                                @error('saldo_awal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endforeach
                        <div class="form-group row">
                        <label for="user_id" class="col-md-4 col-form-label text-md-right">Reciever:</label>
                        <div class="col-md-6">
                            <select name="penerima" id="penerima" class="form-select @error('penerima') is-invalid @enderror" required autocomplete="penerima" autofocus >
                            <option selected>-- Choose Reciever --</option>
                            @foreach ($user as $item)
                                    <option value="{{ $item->id }}"> {{ $item->email }}</option>
                                    @endforeach
                            </select>
                            @error('penerima')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah_transaksi" class="col-md-4 col-form-label text-md-right">Transaction Amount:</label>
                            <div class="col-md-6">
                            <input type="hidden" name="transaksi" value="transfer">
                                <input type="hidden" name="status" value="success">
                                <input id="jumlah_transaksi" type="number" onkeyup="sum();" class="form-control @error('jumlah_transaksi') is-invalid @enderror" name="jumlah_transaksi">
                                @error('jumlah_transaksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" hidden="form-group row">
                            <label for="saldo_akhir" class="col-md-4 col-form-label text-md-right">Total Cash Balance:</label>
                            <div class="col-md-6">
                                <input id="saldo_akhir" type="number" onkeyup="sum();" class="form-control @error('saldo_akhir') is-invalid @enderror" name="saldo_akhir" readonly>
                                @error('saldo_akhir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to transfer your balance?')" >
                                    Transfer
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
@extends('layouts.templateadmin')

@section("content")
<section id="basic-horizontal-layouts">
                    <div class="row match-height justify-content-center">
                        <div class="col-md-8 col-12">
            <div class="card">
            <div class="card-header">
            <h5 class="title text-center">..Selamat Datang..</h5><hr>
            </div>
                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome Admin!
                </div>
                </div>
            </div>
            </div>
@endsection
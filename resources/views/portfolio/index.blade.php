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
                                    <h4 class="card-title text-center">My Portfolio</h4><hr>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                        <form method="POST" action="{{url ('/portfolio/storecv')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                        <label for="cv" class="col-md-4 col-form-label text-md-left">CV/Resume :</label>
                                        <div class="col-md-8 mb-1">
                                                <fieldset>
                                                    <div class="input-group">
                                                    @foreach ($user as $item)
                                                        <input value="{{$item->id}}" name="user_id" type="hidden">
                                                        @endforeach
                                                        <input type="file" class="form-control" id="inputGroupFile04"
                                                            aria-describedby="inputGroupFileAddon04"
                                                            aria-label="Upload" name="cv">
                                                        <button class="btn btn-primary" type="submit"
                                                            id="inputGroupFileAddon04"><i class="bi bi-upload"></i></button>
                                                            @foreach ($cv as $item)
                                                            <a href="/assets/cv/{{$item->cv}}" class="btn btn-warning" method="post" target="_blank">
                                                            <i class="bi bi-search"></i>
                                                            </a>
                                                            @endforeach
                                                    </div>
                                                </fieldset>
                                            </div>
                                            </div>
                                        </form>
                                        <form method="POST" action="{{url ('/portfolio/storeportfolio')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                        <label for="cv" class="col-md-4 col-form-label text-md-left">Portfolio :</label>
                                        <div class="col-md-8 mb-1">
                                                <fieldset>
                                                    <div class="input-group">
                                                    @foreach ($user as $item)
                                                        <input value="{{$item->id}}" name="user_id" type="hidden">
                                                        @endforeach
                                                        <input type="file" class="form-control" id="inputGroupFile04"
                                                            aria-describedby="inputGroupFileAddon04"
                                                            aria-label="Upload" name="portfolio">
                                                        <button class="btn btn-primary" type="submit"
                                                            id="inputGroupFileAddon04"><i class="bi bi-upload"></i></button>
                                                            @foreach ($portfolio as $item)
                                                            <a href="/assets/portfolio/{{$item->portfolio}}" class="btn btn-warning" method="post" target="_blank">
                                                            <i class="bi bi-search"></i>
                                                            </a>
                                                            @endforeach
                                                    </div>
                                                </fieldset>
                                            </div>
                                            </div>
                                        </form>
                                        <form method="POST" action="{{url ('/portfolio/storeotherdoc')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                        <label for="cv" class="col-md-4 col-form-label text-md-left">KTP/NPWP/Kartu Pelajar:</label>
                                        <div class="col-md-8 mb-1">
                                                <fieldset>
                                                    <div class="input-group">
                                                    @foreach ($user as $item)
                                                        <input value="{{$item->id}}" name="user_id" type="hidden">
                                                        @endforeach
                                                        <input type="file" class="form-control" id="inputGroupFile04"
                                                            aria-describedby="inputGroupFileAddon04"
                                                            aria-label="Upload" name="otherdoc">
                                                        <button class="btn btn-primary" type="submit"
                                                            id="inputGroupFileAddon04"><i class="bi bi-upload"></i></button>
                                                            @foreach ($otherdoc as $item)
                                                            <a href="/assets/documents/{{$item->otherdoc}}" class="btn btn-warning" method="post" target="_blank">
                                                            <i class="bi bi-search"></i>
                                                            </a>
                                                            @endforeach
                                                    </div>
                                                </fieldset>
                                            </div>
                                            </div>
                                        </form>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @include('sweetalert::alert')
@endsection


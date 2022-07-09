@extends('layouts.template')

@section("content")
<h3>Selamat Datang, {{$user->name}}</h3>
                            <p></p>
            <div class="page-content">
                <section class="row">
                    @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <section class="section">
                    <div class="row" id="basic-table">
                        <div class="col-12 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Welcome!</h4><hr>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Title</th>
                                                        <th>Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($announcement as $item)
                                                    <tr>
                                                    <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                {{$item->created_at}}
                                                            </div>
                                                        </td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0">{{$item->title}}</p>
                                                    </td>
                                                    <td class="col-auto">
                                                    <div class="d-flex align-items-center">
                                                        <a href="announcement/detail/{{$item['id']}}" class="btn btn-info rounded-pill" method="post">
                                                            Detail
                                                        </a>
                                                    </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Link Access</h4><hr>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Link</th>
                                                        <th>Visit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($linkaccess as $item)
                                                    <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0">{{$item->title}}</p>
                                                    </td>
                                                    <td class="col-auto">
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{$item->link}}" target="_blank" class="btn btn-info rounded-pill" method="post">
                                                            Visit
                                                        </a>
                                                    </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>           
                </section>
            
            </div>
                        
    

  @endsection


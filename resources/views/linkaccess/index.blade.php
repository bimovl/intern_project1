@extends('layouts.templateadmin')

@section("content")
<section id="basic-horizontal-layouts">
                    <div class="row match-height justify-content-center">
                        <div class="col-md-10 col-12">
@if (session('status'))
            <div class="alert alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('status') }}
            </div>
            @endif
        <div class="card justify-content">
            <div class="card-header">
                <h5 class="title text-center">Link Access</h5><hr>
              </div>
            <div class="card-body table-responsive">
            <div class="text-left">
              <a href="{{ route('linkaccess.add') }}" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i> Add Link
            </a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No </th>
                        <th>Title </th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->title}} </td>
                        <td> {{$item->link}} </td>
                        <td class="text-center">
                            <a href="/linkaccess/edit/{{$item['id']}}" class="btn btn-primary btn-sm" method="post">
                            <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="/linkaccess/delete/{{$item['id']}}" class="btn btn-danger btn-sm" method="post" onclick="return confirm('Yakin ingin menghapus data?')">
                            <i class="bi bi-trash-fill"></i>
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
@extends('layouts.templateadmin')

@section("content")
<section id="basic-horizontal-layouts">
                    <div class="row match-height justify-content-center">
                        <div class="col-md-10 col-12">
     <div class="card">
        <div class="card-header">
             <h5 class="title text-center">Edit Announcement</h5>
        </div>
              <div class="card-body">
              <form method="post" action="{{ route('announcement.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                            <input type="hidden" name="id" value="{{$data['id']}}">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$data['title']}}" autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>

                            <div class="col-md-8">
                            <textarea name="content" id="textarea-input" rows="6" placeholder="Content..." class="form-control @error('content') is-invalid @enderror" autofocus>{{$data['content']}}</textarea>    
                                @error('content')
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


 @endsection
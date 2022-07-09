@extends('layouts.template')

@section("content")
<section id="basic-horizontal-layouts">
                    <div class="row match-height justify-content-center">
                        <div class="col-md-7 col-12">
@if (session('status'))
            <div class="alert alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('status') }}
            </div>
            @endif
                        <div class="card justify-content-center">
                        <div class="card-header">
                            <h5 class="title text-center">My Profile</h5><hr>
                        </div>
                        <div class="card-body text-center">
                            <div class="author">
                                <h5 class="title">{{Auth::user()->name}} {{Auth::user()->lastname}}</h5>
                            </div>
                            <div class="form-group">
                                    <a style="font-size: 15px"><strong> Email :</a></strong>
                                    <p>{{ $user->email}} </p>
                                </div>
                                <div class="form-group">
                                    <a style="font-size: 15px"><strong> Mobile : </a></strong>
                                    <p>{{ $user->phone}} </p>
                                </div>
                                <a href="{{ route('user.edit') }}"><strong>Edit Profile</a></strong>
                            
                        </div>
                        <hr>
                        <div class="button-container text-center">
                        <a href="https://{{$user->instagram}}" target="_blank">
                            <button  class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="bi bi-instagram"></i>
                            </button>
                        </a>
                        <a href="https://{{$user->github}}" target="_blank">
                            <button class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="bi bi-github"></i>
                            </button>
                        </a>
                        <a href="https://{{$user->twitter}}" target="_blank">
                            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="bi bi-twitter"></i>
                            </button>
                        </a>
                        </div>
                        <hr>
                        <div class="author text-center">
                        <form method="post" action="{{ route('user.disable') }}">
                                    @csrf
                                    <div class="form-group row" hidden="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">First Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" required autocomplete="name" autofocus>
                                            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $user->lastname}}" autofocus placeholder="Last Name">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email}}" required autocomplete="email">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Password">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone}}" autocomplete="phone" autofocus placeholder="Mobile Number">
                                            <input id="instagram" type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="{{ $user->instagram}}"  autofocus placeholder="Instagram URL">
                                            <input id="github" type="text" class="form-control @error('github') is-invalid @enderror" name="github" value="{{ $user->github}}" autofocus placeholder="Github URL">
                                            <input id="twitter" type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="{{ $user->twitter}}" autofocus placeholder="Twitter URL">
                                            <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ $user->role}}" autofocus placeholder="role">
                                            <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="disable" autofocus placeholder="role">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Close Account?')">
                            Close Account
                        </button>
                        <p></p>
                        </div>
                    </form>

                        </div>
                    </div>
                    </div>
</section>
                    </div>
            
            @endsection
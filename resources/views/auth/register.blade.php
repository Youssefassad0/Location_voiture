@extends('layouts.index')

@section('title')
    Register page
@endsection

@section('content')
    <div class="container">
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-5">
            <form action="{{ route('postRegister') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-outline mb-4">
                    <input name='name' type="text" id="form3Example3" class="form-control form-control-lg"
                        placeholder="Enter a valid name " value="{{ old('name') }}" />
                    @error('name')
                        <div class="bg-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <label class="form-label" for="form3Example3">Name : </label>
                </div>

                <div class="form-outline mb-4">
                    <input name='email' type="text" id="form3Example3" class="form-control form-control-lg"
                        placeholder="Enter a valid email address" value="{{ old('email') }}" />
                    <label class="form-label" for="form3Example3">Email address</label>
                    @error('email')
                        <div class="bg-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-outline mb-3">
                    <input name='password' type="password" id="form3Example4" class="form-control form-control-lg"
                        placeholder="Enter password" value="{{ old('password') }}" />
                    <label class="form-label" for="form3Example4">Password</label>
                    @error('password')
                        <div class="bg-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-outline mb-3">
                    <input name='image' type="file" class="form-control form-control-lg" value="{{ old('image') }}" />
                    <label class="form-label">Profile Image </label>
                    @error('image')
                        <div class="bg-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="text-center text-lg-start mt-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-lg"
                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Sign Up </button>
                    <p class="small fw-bold mt-2 pt-1 mb-0">already have an account? <a href="{{ route('login') }}"
                            class="link-danger">Login</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection

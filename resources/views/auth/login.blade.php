@extends('layouts.index')

@section('title')
    Login page
@endsection

@section('content')
    <div class="container">
        <div class="container mt-5">
            <form action="{{ route('postlogin') }}" method="POST">
                @csrf
                <div class="form-outline mb-4">
                    <input type="text" name="email" value="{{ old('email') }}" id="form3Example3"
                        class="form-control form-control-lg" placeholder="Enter a valid email address" />
                    <label class="form-label" for="form3Example3">Email address</label>
                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-outline mb-3">
                    <input type="password" name="password" id="form3Example4" value="{{ old('password') }}"
                        class="form-control form-control-lg" placeholder="Enter password" />
                    <label class="form-label" for="form3Example4">Password</label>
                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="text-center text-lg-start mt-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-lg"
                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ route('register') }}"
                            class="link-danger">Register</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection

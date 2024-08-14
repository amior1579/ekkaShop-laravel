@extends('shop.main')

@section('title')
    <title>Ekka</title>
@endsection

@section('contents')
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Log In</h2>
                        <h2 class="ec-title">Log In</h2>
                        <p class="sub-title mb-3">Best place to buy and sell digital products</p>
                    </div>
                </div>
                <div class="ec-login-wrapper">
                    <div class="ec-login-container">
                        <div class="ec-login-form">
                            @error('loginError')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <form action="{{url('user_login')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <span class="ec-login-wrap">
                                    <label>Username</label>
                                    <input type="text" name="username" placeholder="Enter your username" value="{{ old('username') }}" required />
                                    @error('username')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                                <span class="ec-login-wrap">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="Enter your password" required />
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </span>
                                <span class="ec-login-wrap ec-login-fp">
                                    <label><a href="#">Forgot Password?</a></label>
                                </span>
                                <span class="ec-login-wrap ec-login-btn">
                                    <button class="btn btn-primary" type="submit">Login</button>
                                    <a href="{{url('register')}}" class="btn btn-secondary">Register</a>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

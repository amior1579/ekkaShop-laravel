@extends('shop.main')

@section('title')
    <title>Register</title>
@endsection

@section('contents')
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Register</h2>
                        <h2 class="ec-title">Register</h2>
                        <p class="sub-title mb-3">Best place to buy and sell digital products</p>
                    </div>
                </div>
                <div class="ec-register-wrapper">
                    <div class="ec-register-container">
                        <div class="ec-register-form">
                            <form action="{{url('user_register')}}" method="post">
                                @csrf
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Username*</label>
                                    <input type="text" name="username" placeholder="Enter your username" required />
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Name</label>
                                    <input type="text" name="name" placeholder="Enter your name" />
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Email</label>
                                    <input type="email" name="email" placeholder="Enter your email add..." />
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Phone Number</label>
                                    <input type="text" name="phoneNumber" placeholder="Enter your phone number"/>
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="Enter your password" required/>
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>password confirmation</label>
                                    <input type="password" name="password_confirmation" placeholder="Enter your password_confirmation" required/>
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Profile</label>
                                    <input type="file" name="profile"/>
                                </span>
                                <span class="ec-register-wrap ec-register-btn">
                                    <button class="btn btn-primary" type="submit">Register</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.base')

@section('title')
Login
@endsection

@section('content')

<div class="form-container">
    <div class="welcome-text">
        <h2>FILM<span>SALES</span></h2>
        <p>Please Login below to Proceed</p>
    </div>
    <div class="form">
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            @if (session('error'))
                <div class="input-field alert danger inner">
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            @if (session('success'))
                <div class="input-field alert success inner">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="input-field">
                <div class="user-details">
                    <i class="bx bx-envelope"></i>
                    <label for="">Email Address</label>
                </div>
                <input type="email"placeholder="Your Email" name="email" required>     
            </div>

            <div class="input-field">
                <div class="user-details">
                    <i class="bx bx-key"></i>
                    <label for="">Password</label>
                </div>
                <input type="password" placeholder="Your Password" name="password" required>     
            </div>

            <div class="bod-bot"></div>

            <input class="submit" type="submit" value="Login">

            <p class="options">Don't have an account? <span><a href="signup.html">Sign up</a></span></p>

        </form>
    </div>
</div>

@endsection
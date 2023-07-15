@extends('layouts.base')

@section('title')
Create Account
@endsection

@section('content')

<div class="form-container">
    <div class="welcome-text">
        <h2>FILM<span>SALES</span></h2>
        <p>Create your Account</p>
    </div>
    <div class="form">
        <!-- <div class="alert success">
            <p>Incorrect username</p>
        </div> -->
        <form action="{{ route('signup') }}" method="POST">
            @csrf 
            
            @if (session('message'))
                <div class="input-field alert success inner">
                    <p>{{ session('message') }}</p>
                </div>
            @endif           
            
            <div class="input-field">
                <div class="user-details">
                    <i class="bx bx-user"></i>
                    <label for="">Full Name</label>
                </div>
                <input type="text" placeholder="Your Full name" name="name" value="{{ old('name') }}" style="@error('name') border: 1px solid red; @enderror"> 
            </div>

            @error('name')
                <div class="input-field alert danger inner">
                    <p>{{ $message }}</p>
                </div> 
            @enderror


            <div class="input-field">
                <div class="user-details">
                    <i class="bx bx-map"></i>
                    <label for="">Address</label>
                </div>
                <input type="text"placeholder="Your Address" name="address" value="{{ old('address') }}" style="@error('address') border: 1px solid red; @enderror">     
            </div>

            @error('address')
                <div class="input-field alert danger inner">
                    <p>{{ $message }}</p>
                </div> 
            @enderror

            <div class="input-field">
                <div class="user-details">
                    <i class="bx bx-calendar"></i>
                    <label for="">Date of Birth</label>
                </div>
                <input type="date"placeholder="Your Date of Birth" name="date" value="{{ old('date') }}" style="@error('date') border: 1px solid red; @enderror">     
            </div>

            @error('date')
                <div class="input-field alert danger inner">
                    <p>{{ $message }}</p>
                </div> 
            @enderror


            <div class="input-field">
                <div class="user-details">
                    <i class="bx bx-envelope"></i>
                    <label for="">Email Address</label>
                </div>
                <input type="email"placeholder="Your Email" name="email" value="{{ old('email') }}" style="@error('email') border: 1px solid red; @enderror">     
            </div>

            @error('email')
                <div class="input-field alert danger inner">
                    <p>{{ $message }}</p>
                </div> 
            @enderror

            <div class="input-field">
                <div class="user-details">
                    <i class="bx bx-key"></i>
                    <label for="">Password</label>
                </div>
                <input type="password" placeholder="Your Password" name="password" value="{{ old('password') }}" style="@error('password') border: 1px solid red; @enderror">     
            </div>

            @error('password')
                <div class="input-field alert danger inner">
                    <p>{{ $message }}</p>
                </div> 
            @enderror

            <div class="input-field">
                <div class="user-details">
                    <i class="bx bx-key"></i>
                    <label for="">Confirm Password</label>
                </div>
                <input type="password" placeholder="Confirm Password" name="password_confirmation">     
            </div>

            <div class="bod-bot"></div>

            <input class="submit" type="submit" value="Create Account">
            
            <p class="options">Have an account already? <span><a href="login.html">Login</a></span></p>
        </form>
    </div>
</div>

@endsection
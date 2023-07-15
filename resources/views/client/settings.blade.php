@extends('layouts.base')

@section('title')
Edit Profile
@endsection

@section('content')

    <section class="movies container margin-top" id="popular">
        <div class="heading">
            <h2 class="heading-title">Welcome Back, {{ Session::get('name') }}</h2>
        </div>

        <h1 class="page-title profile">
            Edit your Profile
        </h1>

        <div class="form-container profile">
            <div class="form">
                
                <form action="{{ route('settings', ['id' => Session::get('id')]) }}" method="POST">    
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
                        <input type="text"placeholder="Your Full name" name="name" value="{{ $client->name }}">     
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
                        <input type="text"placeholder="Your Address" name="address" value="{{ $client->address }}">     
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
                        <input type="date"placeholder="Your Date of Birth" name="date" value="{{ $client->date }}" >     
                    </div>

                    @error('date')
                        <div class="input-field alert danger inner">
                            <p>{{ $message }}</p>
                        </div> 
                    @enderror

                    <div class="input-field">
                        <div class="user-details">
                            <i class="bx bx-key"></i>
                            <label for="">Change Password</label>
                        </div>
                        <input type="password" placeholder="Your Password" name="password">     
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

                    <input class="submit" type="submit" value="Update Profile">
                    
                </form>
            </div>
        </div>
    </section>
@endsection
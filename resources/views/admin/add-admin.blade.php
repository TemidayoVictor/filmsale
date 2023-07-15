@extends('layouts.base')

@section('title')
Admin | Add Admin
@endsection


@section('content')
    <section class="movies container margin-top" id="popular">
        <div class="heading">
            <h2 class="heading-title">Welcome Back, {{ Session::get('name') }}</h2>
        </div>

        <div class="filter">
            <form action="{{ route('changeAdd') }}" method="post">
                @csrf
                <select name="genre" id="">
                    <option value="1">Add New Movie</option>
                    <option value="2">Add New Genre</option>
                    <option value="3">Add New Admin</option>
                </select>
                <input type="submit" value="Change" class="submit">
            </form>
        </div>

        <h1 class="page-title profile">
            Add New Admin User
        </h1>

        <div class="form-container profile">
            <div class="form">
                
                <form action="{{ route('addAdmin') }}" method="POST">
                    @csrf 
                    
                    @if (session('message'))
                        <div class="input-field alert success inner">
                            <p>{{ session('message') }}</p>
                        </div>
                    @endif           
                    
                    <div class="input-field">
                        <div class="user-details">
                            <i class="bx bx-user"></i>
                            <label for="">Username</label>
                        </div>
                        <input type="text" placeholder="Create Username" name="name" value="{{ old('name') }}" style="@error('name') border: 1px solid red; @enderror"> 
                    </div>
        
                    @error('name')
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
        
                    <input class="submit" type="submit" value="Add Admin">
                    
                    <p class="options">Have an admin account already? <span><a href="login.html">Login</a></span></p>
                </form>

            </div>
        </div>
    </section>

@endsection



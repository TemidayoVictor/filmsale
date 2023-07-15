@extends('layouts.base')

@section('title')
Admin | Add Genre
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

    <div class="form-container profile">
        <div class="form">
            <form action="{{ route('addGenre') }}" method="POST">
                <h1 class="page-title profile">
                    Add New Genre
                </h1>
                @csrf

                @if (session('message'))
                    <div class="input-field alert success inner">
                        <p>{{ session('message') }}</p>
                    </div>
                @endif

                <div class="input-field">
                    <div class="user-details">
                        <i class="bx bx-tv"></i>
                        <label for="">Genre Title</label>
                    </div>
                    <input type="text"placeholder="Genre Title" name="genre" required>     
                </div>

                @error('genre')
                    <div class="input-field alert danger inner">
                        <p>{{ $message }}</p>
                    </div> 
                @enderror

                <div class="bod-bot"></div>
    
                <input class="submit" type="submit" value="Add Genre">
                
            </form>
        </div>
    </div>
</section>

@endsection

@extends('layouts.base')

@section('title')
Admin | Edit Movie
@endsection

@section('content')
    <section class="movies container margin-top" id="popular">
        <div class="heading">
            <h2 class="heading-title">Welcome Back, {{ Session::get('name') }}</h2>
        </div>

        <h1 class="page-title profile">
            Edit {{ $movie->name }}
        </h1>

        <div class="form-container profile">
            <div class="form">
                
                <form action="{{ route('editMovie', ['id' => $movie->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
            
                    @if (session('message'))
                        <div class="input-field alert success inner">
                            <p>{{ session('message') }}</p>
                        </div>
                    @endif

                    <div class="input-field">
                        <div class="user-details">
                            <i class="bx bx-tv"></i>
                            <label for="">Name of Movie</label>
                        </div>
                        <input type="text"placeholder="Name of Movie" name="name" value="{{ $movie->name }}" style="@error('name') border: 1px solid red; @enderror" >     
                    </div>

                    @error('name')
                        <div class="input-field alert danger inner">
                            <p>{{ $message }}</p>
                        </div> 
                    @enderror

                    <div class="input-field">
                        <div class="user-details">
                            <i class="bx bx-pen"></i>
                            <label for="">Short Description</label>
                        </div>
                        <textarea type="text"placeholder="Movie Description" name="description" value="{{ $movie->description }}" style="@error('description') border: 1px solid red; @enderror">{{ $movie->description }}</textarea>
                    </div>

                    @error('description')
                        <div class="input-field alert danger inner">
                            <p>{{ $message }}</p>
                        </div> 
                    @enderror

                    <div class="input-field">
                        <div class="user-details">
                            <i class="bx bx-book"></i>
                            <label for="">Genre of Movie</label>
                        </div>
                        <select name="genre" id="" value="{{ old('genre') }}" style="@error('genre') border: 1px solid red; @enderror">
                            <option value="@if(!empty($movie->genre)){{ $movie->genre }} @else {{ "" }} @endif">@if(!empty($movie->genre)){{ $movie->genre }} @else Choose Genre @endif</option>
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->genre }}">{{ $genre->genre }}</option>
                            @endforeach
                        </select>    
                    </div>

                    @error('genre')
                        <div class="input-field alert danger inner">
                            <p>{{ $message }}</p>
                        </div> 
                    @enderror

                    <div class="input-field">
                        <div class="user-details">
                            <i class="bx bx-image"></i>
                            <label for="">Image of Movie</label>
                        </div>
                        <input type="file" accept="image/*" name="image" value="{{ $movie->image }}" style="@error('image') border: 1px solid red; @enderror">
                        <input type="text" name="initialImage" value="{{ $movie->image }}" readonly>     
                    </div>

                    @error('image')
                        <div class="input-field alert danger inner">
                            <p>{{ $message }}</p>
                        </div> 
                    @enderror

                    <div class="input-field">
                        <div class="user-details">
                            <i class="bx bx-video"></i>
                            <label for="">Movie asset [Video]</label>
                        </div>
                        <input type="file" accept="video/*" name="video" value="{{ old('video') }}" style="@error('video') border: 1px solid red; @enderror">     
                        <input type="text" name="initialVideo" value="{{ $movie->video }}" readonly>
                        <small>Video size should not exceed 40mb</small>
                    </div>

                    @error('video')
                        <div class="input-field alert danger inner">
                            <p>{{ $message }}</p>
                        </div> 
                    @enderror

                    <div class="input-field">
                        <div class="user-details">
                            <i class="bx bx-money"></i>
                            <label for="">Price of Movie</label>
                        </div>
                        <input type="text" name="price" value="{{ $movie->price }}" style="@error('price') border: 1px solid red; @enderror">     
                    </div>

                    @error('price')
                        <div class="input-field alert danger inner">
                            <p>{{ $message }}</p>
                        </div> 
                    @enderror

                    <div class="bod-bot"></div>
        
                    <input class="submit" type="submit" value="Update Movie">
                    
                </form>
            </div>
        </div>
    </section>
    {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit blanditiis aut provident, dignissimos soluta fuga alias sed incidunt beatae cumque? Inventore animi earum consequuntur rem fuga nobis! Eveniet, quaerat quas. --}}
@endsection

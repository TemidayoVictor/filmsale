@extends('layouts.base')

@section('title')
{{ $genre }} Movies
@endsection

@section('content')

    <section class="movies container margin-top" id="movies">
        <div class="heading">
            <h2 class="heading-title">{{ $genre }} Movies</h2>
            
        </div>

        <div class="movies-content">
            @forelse ($movies as $movie)
            
                <div class="movie-box">
                    <img src="{{ asset('images/'.$movie->image) }}" alt="" class="movie-box-img">
                    <div class="box-text">
                        <p class="movie-title">{{ $movie->name }}</p>
                        <div class="flex">
                            <span class="movie-type">{{ $movie->genre }}</span>
                            <span class="movie-type"># {{ number_format($movie->price) }}</span>
                        </div>
                        <a href="{{ route('movieView', ['id' => $movie->id]) }}" class="btn-line">View more</a>
                        
                    </div>
                </div>
            
            @empty
                
            @endforelse
            

        </div>
    </section>
@endsection
@extends('layouts.base')

@section('title')
Home
@endsection

@section('content')
    <section class="home container" id="home">
        <img src="images/home-background.png" alt="" class="home-img">
        <div class="home-text">
            <h1 class="home-title">Welcome to <br> Film<span style="color: #ffb43a; ">Sale</span> </h1>
            <p>Purchase Premium Movies</p>
            
        </div>
    </section>

    <!-- Popular Section -->

    <section class="popular container" id="popular">
        <div class="heading">
            <h2 class="heading-title">Popular Movies </h2>
            <div class="swiper-btn">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>

        <div class="popular-content swiper">
            <div class="swiper-wrapper">
                @forelse ($popular as $pop)
                <div class="swiper-slide">
                    <div class="movie-box">
                        <img src="{{ asset('images/'.$pop->image) }}" alt="" class="movie-box-img">
                        <div class="box-text">
                            <p class="movie-title">{{ $pop->name }}</p>
                            <div class="flex">
                                <span class="movie-type">{{ $pop->genre }}</span>
                                <span class="movie-type"># {{ number_format($pop->price) }}</span>
                            </div>                            
                            <a href="{{ route('movieView', ['id' => $pop->id]) }}" class="btn-line">Watch the Trailer</a>
                        </div>
                    </div>
                </div>

                @empty
                    
                @endforelse
                
            </div>
        </div>
    </section>

    <!-- Movies -->

    <section class="movies container" id="movies">
        <div class="heading">
            <h2 class="heading-title">Movies and Shows </h2>
            
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

    <!-- Next Page -->

    {{-- <div class="next-page">
        <a href="#" class="btn">Next Page</a>
    </div> --}}
@endsection
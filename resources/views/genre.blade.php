@extends('layouts.base')

@section('title')
Genre
@endsection

@section('content')

    <section class="movies genre-movie container margin-top" id="movies">
        <div class="heading">
            <h2 class="heading-title">Movie Genres </h2>            
        </div>

        <div class="genres">
            @forelse ($genres as $genre)
                <a href="{{ route('genreView', ['id' => $genre->genre]) }}" class="genre-box">
                    <h2>{{ $genre->genre }}</h2>
                    <div class="details">
                        <p>Last Updated: Recently</p>
                        <div style="display:none">{{ $total = 0 }}</div>
                        @foreach ($movies as $movie)
                            @if ($movie->genre == $genre->genre)
                                <div style="display:none">{{ $total = $total + 1 }}</div>
                            @endif
                        @endforeach
                        <p>{{ $total }} Movies Available</p>
                    </div>
                </a>
            @empty
                <div>
                    <h2>No Genres Currently</h2>
                </div>    
            @endforelse


        </div>
    </section>

@endsection
@extends('layouts.base')

@section('title')
{{ $movie->name }}
@endsection

@section('content')
    <div class="play-container container">
        <img src="{{ asset('images/'.$movie->image) }}" alt="" class="play-img">
        
        <div class="play-text">
            <h2>{{ $movie->name }}</h2>
            <div class="rating">
                <i class="bx bxs-star"></i>
                <i class="bx bxs-star"></i>
                <i class="bx bxs-star"></i>
                <i class="bx bxs-star"></i>
                <i class="bx bxs-star-half"></i>
            </div>
            <div class="tags">
                <span>{{ $movie->genre }}</span>
            </div>
        </div>
        <!-- <i class="bx bx-right-arrow play-movie"></i>         -->

    </div>

    <div class="about-movie container">
        <h2>{{ $movie->name }} : Price # {{ number_format($movie->price) }}</h2>
        <p>        
            {{ $movie->description }}
        </p>
        @if (session('message'))
            <div class="filter">                
                <div class="input-field alert success inner">
                    <p>{{ session('message') }}</p>
                </div>
            </div>            
        @endif
    </div>

    @if ((auth()->user() && auth()->user()->type == "client"))
        <form action="{{ route('purchase', ['id' => $movie->id]) }}" class="purchase container" method="POST">
            @csrf
            <input type="submit" value="Purchase Movie">
        </form>
    @else
        <form class="purchase container">
            @csrf
            <a href="{{ route('login') }}" style="color: #ffb43a; text-decoration: underline">Login as a Client to Purchase</a>
        </form>
    @endif


@endsection
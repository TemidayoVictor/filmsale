@extends('layouts.base')

@section('title')
Purchase List
@endsection

@section('content')

    <section class="movies container margin-top" id="popular">
        <div class="heading">
            <h2 class="heading-title">Welcome Back, {{ Session::get('name') }}</h2>
        </div>

        <h1 class="page-title">
            Puchase List
        </h1>

        <div class="purchase-list">
            @forelse ($purchases as $purchase)
                <div class="purchase-box">
                    <div class="purchase-image">
                        <img src="{{ asset('images/'.$purchase->image) }}" alt="">
                    </div>
                    <div class="purchase-details">
                        <div class="movie-name">
                            <p>{{ $purchase->movie }}</p>
                        </div>
                        <div class="sub-details flex">
                            <p><strong>Price: </strong># {{ number_format($purchase->price) }}</p>
                        </div>
                        <div class="movie-rating">
                            <form action="">
                                <input type="submit" class="submit" value="Download Movie">
                            </form>
                        </div>
                    </div>
                </div>
            @empty
            <div>
                <h2>You have not made any purchase yet</h2>
            </div>    
            @endforelse

        </div>

        <div class="total flex">
            <h1>Total Purchase Amount: # {{ number_format($total) }}</h1>
        </div>
    </section>
@endsection
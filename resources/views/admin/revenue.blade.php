@extends('layouts.base')

@section('title')
Admin | Revenue
@endsection

@section('content')

    <section class="movies container margin-top" id="movies">
        <div class="heading flex">
            <h2 class="heading-title">Revenue</h2>            
        </div>

        <div class="filter">
            <form action="{{ route('revenue') }}" method="post">
                @csrf
                @if (session('message'))
                    <div class="input-field alert success inner">
                        <p>{{ session('message') }}</p>
                    </div>
                @endif
                <div class="input-field">
                    <label for="">Title of Batch</label>
                    <input type="text" name="batch" required>
                </div>
                <input type="submit" value="Add New Batch" class="submit">
            </form>
            
        </div>
        @forelse ($revenues as $revenue)
            <div class="genres users">
                <div href="movies.html" class="genre-box">
                    <h2>{{ $revenue->title }}</h2>
                    <div class="details flex">
                        <p>Last Update: {{ $revenue->updated_at }}</p>
                        <h2># {{  number_format($revenue->amount) }}</h2>
                    </div>
                </div>
            </div>
        @empty
            <div>
                <h2>There is no revenue yet</h2>
            </div>
        @endforelse

    </section>

@endsection

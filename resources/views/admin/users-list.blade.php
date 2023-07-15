@extends('layouts.base')

@section('title')
Admin | Users List
@endsection

@section('content')

    <section class="movies container margin-top" id="movies">
        <div class="heading flex">
            <h2 class="heading-title">List of Users {{ $ageRange }}</h2>            
        </div>

        <div class="filter">
            <form action="{{ route('filterUsers') }}" method="POST">
                @csrf
                <select name="age" id="" required>
                    <option value="1">Users Below 50 Years Old</option>
                    <option value="2">Users Above 50 Years Old</option>
                </select>
                <input type="submit" value="Filter" class="submit">
            </form>
        </div>

        <div class="genres users">
            @forelse ($users as $user)
                <div href="movies.html" class="genre-box">
                    <h2>{{ $user->name }}</h2>
                    <div class="details flex">
                        <p>Email: {{ $user->email }}</p>
                        
                    </div>
                </div>
            @empty
                <div>
                    <h2>No user in the Database</h2>
                </div>
            @endforelse
        </div>

    </section>

@endsection
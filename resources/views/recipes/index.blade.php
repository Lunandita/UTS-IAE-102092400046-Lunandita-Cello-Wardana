@extends('layouts.app')

@section('content')
    <div class="text-center mb-5">
        <h1 class="fw-bold display-5">🍽️ Daftar Resep Makanan</h1>
        <p class="text-muted fs-5">Temukan berbagai inspirasi masakan favoritmu</p>
    </div>

    <form action="{{ route('recipes.search') }}" method="GET" class="mb-4">
        <div class="input-group shadow-sm">
            <input
                type="text"
                name="keyword"
                class="form-control"
                placeholder="Cari resep, contoh: chicken"
                required
            >
            <button class="btn btn-danger" type="submit">Cari</button>
        </div>
    </form>

    <div class="row">
        @forelse ($meals as $meal)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100 border-0">
                    <img src="{{ $meal['strMealThumb'] }}" class="card-img-top" alt="{{ $meal['strMeal'] }}">
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold">{{ $meal['strMeal'] }}</h5>

                        @if(isset($meal['strCategory']))
                            <p class="mb-1 text-muted">
                                <strong>Kategori:</strong> {{ $meal['strCategory'] }}
                            </p>
                        @endif

                        @if(isset($meal['strArea']))
                            <p class="mb-3 text-muted">
                                <strong>Asal:</strong> {{ $meal['strArea'] }}
                            </p>
                        @endif

                        <a href="{{ route('recipes.show', $meal['idMeal']) }}" 
                           class="btn btn-primary mt-auto">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    Data resep tidak tersedia.
                </div>
            </div>
        @endforelse
    </div>
@endsection
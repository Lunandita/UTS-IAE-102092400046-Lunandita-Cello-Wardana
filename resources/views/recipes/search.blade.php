@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Hasil Pencarian</h1>
    <p class="text-muted">Kata kunci: <strong>{{ $keyword }}</strong></p>

    <form action="{{ route('recipes.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input
                type="text"
                name="keyword"
                class="form-control"
                placeholder="Cari resep lagi..."
                value="{{ $keyword }}"
                required
            >
            <button class="btn btn-danger" type="submit">Cari</button>
        </div>
    </form>

    <div class="row">
        @forelse ($meals as $meal)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ $meal['strMealThumb'] }}" class="card-img-top" alt="{{ $meal['strMeal'] }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $meal['strMeal'] }}</h5>

                        @if(isset($meal['strCategory']))
                            <p class="mb-1"><strong>Kategori:</strong> {{ $meal['strCategory'] }}</p>
                        @endif

                        @if(isset($meal['strArea']))
                            <p class="mb-3"><strong>Asal:</strong> {{ $meal['strArea'] }}</p>
                        @endif

                        <a href="{{ route('recipes.show', $meal['idMeal']) }}" class="btn btn-primary mt-auto">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning">
                    Resep dengan kata kunci <strong>{{ $keyword }}</strong> tidak ditemukan.
                </div>
            </div>
        @endforelse
    </div>
@endsection
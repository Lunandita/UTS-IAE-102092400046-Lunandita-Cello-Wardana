@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Kategori: {{ $name }}</h1>

    <div class="row">
        @forelse ($meals as $meal)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ $meal['strMealThumb'] }}" class="card-img-top" alt="{{ $meal['strMeal'] }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $meal['strMeal'] }}</h5>
                        <a href="{{ route('recipes.show', $meal['idMeal']) }}" class="btn btn-primary mt-auto">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning">
                    Tidak ada resep pada kategori ini.
                </div>
            </div>
        @endforelse
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="text-center mb-4">
        <h1 class="fw-bold">Kategori Resep</h1>
        <p class="text-muted">Pilih kategori makanan yang ingin dilihat</p>
    </div>

    <div class="row">
        @forelse ($categories as $category)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ $category['strCategoryThumb'] }}" class="card-img-top" alt="{{ $category['strCategory'] }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $category['strCategory'] }}</h5>
                        <p class="card-text text-muted">
                            {{ \Illuminate\Support\Str::limit($category['strCategoryDescription'], 100) }}
                        </p>
                        <a href="{{ route('categories.show', $category['strCategory']) }}" class="btn btn-success mt-auto">
                            Lihat Resep
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    Kategori tidak tersedia.
                </div>
            </div>
        @endforelse
    </div>
@endsection
@extends('layouts.app')

@section('content')
    @if($meal)
        <div class="card shadow-sm p-4">
            <div class="row">
                <div class="col-md-5 text-center mb-3">
                    <img src="{{ $meal['strMealThumb'] }}" alt="{{ $meal['strMeal'] }}" class="img-fluid recipe-detail-img">
                </div>

                <div class="col-md-7">
                    <h1 class="fw-bold">{{ $meal['strMeal'] }}</h1>
                    <p><strong>Kategori:</strong> {{ $meal['strCategory'] }}</p>
                    <p><strong>Asal:</strong> {{ $meal['strArea'] }}</p>

                    @if(!empty($meal['strYoutube']))
                        <p>
                            <strong>Video Tutorial:</strong>
                            <a href="{{ $meal['strYoutube'] }}" target="_blank">Lihat di YouTube</a>
                        </p>
                    @endif
                </div>
            </div>

            <hr>

            <h3>Bahan-bahan</h3>
            <ul>
                @for ($i = 1; $i <= 20; $i++)
                    @php
                        $ingredient = $meal['strIngredient' . $i] ?? '';
                        $measure = $meal['strMeasure' . $i] ?? '';
                    @endphp

                    @if(!empty(trim($ingredient)))
                        <li>{{ $ingredient }} - {{ $measure }}</li>
                    @endif
                @endfor
            </ul>

            <hr>

            <h3>Instruksi Memasak</h3>
            <p style="white-space: pre-line;">{{ $meal['strInstructions'] }}</p>

            <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    @else
        <div class="alert alert-danger">
            Detail resep tidak ditemukan.
        </div>
    @endif
@endsection
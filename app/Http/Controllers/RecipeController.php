<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecipeController extends Controller
{
    public function index()
    {
        $response = Http::get('https://www.themealdb.com/api/json/v1/1/search.php?s=');

        if ($response->failed()) {
            return view('recipes.index', [
                'meals' => [],
                'error' => 'Gagal mengambil data dari API.'
            ]);
        }

        $meals = $response->json()['meals'] ?? [];

        return view('recipes.index', compact('meals'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $response = Http::get('https://www.themealdb.com/api/json/v1/1/search.php?s=' . urlencode($keyword));

        if ($response->failed()) {
            return view('recipes.search', [
                'meals' => [],
                'keyword' => $keyword,
                'error' => 'Gagal mengambil data dari API.'
            ]);
        }

        $meals = $response->json()['meals'] ?? [];

        return view('recipes.search', compact('meals', 'keyword'));
    }

    public function show($id)
    {
        $response = Http::get('https://www.themealdb.com/api/json/v1/1/lookup.php?i=' . $id);

        if ($response->failed()) {
            return view('recipes.show', [
                'meal' => null,
                'error' => 'Gagal mengambil detail resep dari API.'
            ]);
        }

        $meal = $response->json()['meals'][0] ?? null;

        return view('recipes.show', compact('meal'));
    }
}
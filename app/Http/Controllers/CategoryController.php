<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    public function index()
    {
        $response = Http::get('https://www.themealdb.com/api/json/v1/1/categories.php');

        if ($response->failed()) {
            return view('categories.index', [
                'categories' => [],
                'error' => 'Gagal mengambil kategori dari API.'
            ]);
        }

        $categories = $response->json()['categories'] ?? [];

        return view('categories.index', compact('categories'));
    }

    public function show($name)
    {
        $response = Http::get('https://www.themealdb.com/api/json/v1/1/filter.php?c=' . urlencode($name));

        if ($response->failed()) {
            return view('categories.show', [
                'meals' => [],
                'name' => $name,
                'error' => 'Gagal mengambil resep berdasarkan kategori.'
            ]);
        }

        $meals = $response->json()['meals'] ?? [];

        return view('categories.show', compact('meals', 'name'));
    }
}
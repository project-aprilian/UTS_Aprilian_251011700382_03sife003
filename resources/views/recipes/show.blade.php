@extends('layouts.app')

@section('title', ($recipe->name ?? 'Detail Resep') . ' - Dapur Kita')

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <a href="{{ route('recipes.index') }}" class="btn btn-outline-success rounded-pill px-4">&larr; Kembali ke Daftar Resep</a>
    </div>

    @php
        $ingredients = $recipe->ingredients ?? [];
        $steps = $recipe->steps ?? [];
        if (is_string($ingredients)) {
            $decoded = json_decode($ingredients, true);
            $ingredients = is_array($decoded) ? $decoded : preg_split('/\r\n|\r|\n/', $ingredients, -1, PREG_SPLIT_NO_EMPTY);
        }
        if (is_string($steps)) {
            $decoded = json_decode($steps, true);
            $steps = is_array($decoded) ? $decoded : preg_split('/\r\n|\r|\n/', $steps, -1, PREG_SPLIT_NO_EMPTY);
        }
        $ingredients = is_array($ingredients) ? $ingredients : [];
        $steps = is_array($steps) ? $steps : [];
        $imagePath = ltrim((string) ($recipe->image ?? ''), '/');
        if ($imagePath !== '' && !str_contains($imagePath, '/')) {
            $imagePath = 'assets/images/' . $imagePath;
        }
    @endphp

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
        <div class="row g-0">
            <div class="col-lg-6">
                @if($imagePath !== '')
                    <img src="{{ asset($imagePath) }}" class="w-100" style="height:100%;min-height:320px;max-height:480px;object-fit:cover" alt="Gambar {{ $recipe->name }}">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-light" style="min-height:320px">Gambar belum tersedia</div>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="p-4 p-lg-5">
                    <span class="badge rounded-pill mb-3 px-3 py-2" style="background:#e0f2e8;color:#176b45">{{ $recipe->category ?? 'Resep Masakan' }}</span>
                    <h1 class="fw-bold mb-3" style="color:#174c38">{{ $recipe->name }}</h1>
                    <p class="text-secondary mb-4">Siapkan bahan-bahannya dan ikuti langkah memasak berikut untuk membuat hidangan lezat di rumah.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <div class="rounded-3 p-3 bg-light"><small class="text-secondary d-block">Waktu Memasak</small><strong>{{ $recipe->cook_time ?? '-' }} @if(is_numeric($recipe->cook_time)) menit @endif</strong></div>
                        <div class="rounded-3 p-3 bg-light"><small class="text-secondary d-block">Kategori</small><strong>{{ $recipe->category ?? 'Umum' }}</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 h-100"><div class="card-body p-4">
                <h3 class="fw-bold mb-4" style="color:#174c38">🥗 Bahan-Bahan</h3>
                @if(count($ingredients))
                    <ul class="list-group list-group-flush">
                        @foreach($ingredients as $ingredient)
                            <li class="list-group-item px-0 py-3"><span class="text-success me-2">✓</span>{{ is_array($ingredient) ? implode(' ', $ingredient) : $ingredient }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-secondary">Daftar bahan belum tersedia.</p>
                @endif
            </div></div>
        </div>
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-4 h-100"><div class="card-body p-4">
                <h3 class="fw-bold mb-4" style="color:#174c38">👨‍🍳 Langkah-Langkah Memasak</h3>
                @if(count($steps))
                    <div class="d-flex flex-column gap-3">
                        @foreach($steps as $index => $step)
                            <div class="d-flex align-items-start gap-3">
                                <span class="badge rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width:34px;height:34px;background:#168653">{{ $index + 1 }}</span>
                                <p class="mb-0 pt-1">{{ is_array($step) ? implode(' ', $step) : $step }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-secondary">Langkah memasak belum tersedia.</p>
                @endif
            </div></div>
        </div>
    </div>

    <div class="text-center mt-5"><a href="{{ route('recipes.index') }}" class="btn btn-success rounded-pill px-5 py-3">Lihat Resep Lainnya</a></div>
</div>
@endsection

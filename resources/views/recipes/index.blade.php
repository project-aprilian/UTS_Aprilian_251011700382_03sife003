@extends('layouts.app')

@section('title', 'Koleksi Resep')

@section('content')
<div class="container py-4 py-lg-5">
    <section class="hero p-4 p-lg-5 mb-5">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <div class="hero-kicker mb-3">Resep rumahan, rasa istimewa</div>
                <h1 class="display-5 fw-bold mb-3">Masak enak jadi lebih <span style="color:var(--brand)">mudah.</span></h1>
                <p class="lead text-secondary mb-4">Temukan inspirasi masakan sehari-hari dengan bahan sederhana dan langkah yang mudah diikuti.</p>
                <a href="#koleksi" class="btn btn-brand btn-lg rounded-pill px-4">Jelajahi Resep <span aria-hidden="true">→</span></a>
            </div>
            <div class="col-lg-5 text-center">
                <img src="{{ asset('assets/images/hero-dapur.svg') }}" alt="Ilustrasi bahan masakan segar" class="img-fluid" style="max-height:260px" onerror="this.style.display='none'">
            </div>
        </div>
    </section>

    <section id="koleksi">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-4">
            <div>
                <div class="hero-kicker mb-2">Pilihan hari ini</div>
                <h2 class="fw-bold mb-1">Koleksi Resep</h2>
                <p class="text-secondary mb-0">Ada {{ $recipes->count() }} resep yang bisa kamu coba.</p>
            </div>
            <form action="{{ route('recipes.index') }}" method="GET" class="d-flex gap-2" role="search">
                <input class="form-control rounded-pill" type="search" name="q" value="{{ $search ?? '' }}" placeholder="Cari nama/kategori..." aria-label="Cari resep">
                <button class="btn btn-dark rounded-pill px-3" type="submit">Cari</button>
                @if(!empty($search))
                    <a class="btn btn-outline-secondary rounded-pill" href="{{ route('recipes.index') }}">Reset</a>
                @endif
            </form>
        </div>

        @if($recipes->isEmpty())
            <div class="alert alert-warning rounded-4">Resep tidak ditemukan. Coba kata pencarian lain.</div>
        @else
            <div class="row g-4">
                @foreach($recipes as $recipe)
                    @php
                        $imagePath = ltrim((string) ($recipe->image ?? ''), '/');
                        if ($imagePath !== '' && !str_contains($imagePath, '/')) {
                            $imagePath = 'assets/images/' . $imagePath;
                        }
                    @endphp
                    <div class="col-sm-6 col-lg-4">
                        <article class="card recipe-card h-100">
                            @if($imagePath !== '')
                                <img src="{{ asset($imagePath) }}" class="recipe-image" alt="Gambar {{ $recipe->name }}" loading="lazy" onerror="this.style.display='none'">
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-light" style="height:220px">🍲 Gambar belum tersedia</div>
                            @endif
                            <div class="card-body p-4 d-flex flex-column">
                                <div class="mb-3"><span class="badge category-pill rounded-pill px-3 py-2">{{ $recipe->category }}</span></div>
                                <h3 class="h5 fw-bold">{{ $recipe->name }}</h3>
                                <p class="text-secondary small mb-4">Bahan sederhana dan langkah praktis untuk menu di rumah.</p>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <span class="small text-secondary">◷ {{ $recipe->cook_time }} menit</span>
                                    <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-outline-dark rounded-pill px-3">Lihat resep</a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
</div>
@endsection

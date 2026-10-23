<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kumpulan resep masakan rumahan yang mudah dibuat.">
    <title>@yield('title', 'Dapur Kita') | Dapur Kita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --brand: #d95d39; --brand-dark: #a83e24; --cream: #fffaf3; --nav-green: #234b3b; }
        body { background: var(--cream); color: #292722; }
        .navbar { background: linear-gradient(110deg, #234b3b, #35664f) !important; border-bottom: 0 !important; box-shadow: 0 4px 18px rgba(24, 55, 41, .16); }
        .navbar-brand { font-weight: 800; letter-spacing: -.4px; color: #fff !important; }
        .navbar .nav-link { color: rgba(255,255,255,.88) !important; font-weight: 500; }
        .navbar .nav-link:hover { color: #ffe2b9 !important; }
        .navbar .navbar-toggler { border-color: rgba(255,255,255,.45); }
        .navbar .navbar-toggler-icon { filter: brightness(0) invert(1); }
        .brand-mark { display:inline-grid; place-items:center; width:36px; height:36px; border-radius:12px; background:var(--brand); color:white; margin-right:.45rem; }
        .btn-brand { background:var(--brand); border-color:var(--brand); color:white; }
        .btn-brand:hover { background:var(--brand-dark); border-color:var(--brand-dark); color:white; }
        .hero { background:linear-gradient(115deg, #fff0df, #ffe2d1); border-radius:28px; overflow:hidden; }
        .hero-kicker { color:var(--brand-dark); font-weight:700; text-transform:uppercase; letter-spacing:1.5px; font-size:.8rem; }
        .recipe-card { border:0; border-radius:18px; overflow:hidden; box-shadow:0 8px 24px rgba(65,45,25,.08); transition:transform .2s ease, box-shadow .2s ease; height:100%; }
        .recipe-card:hover { transform:translateY(-4px); box-shadow:0 14px 30px rgba(65,45,25,.13); }
        .recipe-image { width:100%; height:205px; object-fit:cover; background:#f4e8d8; }
        .category-pill { background:#ffeadc; color:#9c4025; }
        .footer { border-top:1px solid #eee1d4; }
        .detail-image { width:100%; max-height:440px; object-fit:cover; border-radius:22px; background:#f4e8d8; }
        @media (max-width: 575px) { .hero { border-radius:18px; } .recipe-image { height:180px; } }
    </style>
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
    <div class="container py-1">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('recipes.index') }}">
            <span class="brand-mark">DK</span> Dapur Kita
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Buka navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item"><a class="nav-link" href="{{ route('recipes.index') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('recipes.index') }}#koleksi">Koleksi Resep</a></li>
                <li class="nav-item"><a class="btn btn-brand rounded-pill px-3 ms-lg-2" href="{{ route('recipes.index') }}#koleksi">Cari Inspirasi</a></li>
            </ul>
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer class="footer mt-5 py-4 bg-white">
    <div class="container d-flex flex-column flex-md-row justify-content-between gap-2">
        <div><strong>Dapur Kita</strong><div class="small text-secondary">Inspirasi masakan sehari-hari, dari dapur untuk keluarga.</div></div>
        <div class="small text-secondary align-self-md-center">Proyek UTS Rekayasa Web · Laravel &amp; Bootstrap</div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>

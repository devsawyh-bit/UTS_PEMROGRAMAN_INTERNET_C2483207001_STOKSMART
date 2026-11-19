
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - StokSmart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="navbar-nav">
    <a class="nav-link" href="/">Dashboard</a>
    <a class="nav-link" href="/barang">Data Barang</a>
    <a class="nav-link" href="/analisis">Analisis Stok</a>
    <a class="nav-link" href="/tentang">Tentang</a>
</div>
</nav>

<main class="container py-4">
    @yield('content')
</main>

<footer class="text-center py-3 text-muted">
    <small>StokSmart &copy; 2026 - Sistem Analisis Persediaan Barang</small>
</footer>

</body>
</html>

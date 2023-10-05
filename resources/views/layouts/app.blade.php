<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <metviewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <title>@yield('title')</title>
</head>

<body>
    <nav>
        <a href="{{ route('vente.index') }}">Liste des ventes</a>
        <a href="{{ route('produit.index') }}">Liste des produits</a>
        <a href="{{ route('marque.index') }}">Liste des marques</a>
        @yield('content')
    </nav>

</body>

</html>

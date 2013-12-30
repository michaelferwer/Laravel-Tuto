<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>

    <!-- Style -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap-theme.min.css">

    <!-- My style sheet -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Script -->
    <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="css/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/angular.min.js"></script>
</head>

<body>
@if (Auth::check())
    @include('../header')
@endif

@yield('content')

@include('../footer')
</body>
</html>
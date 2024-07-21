<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- cnd fontawesome -->
    <script src="https://kit.fontawesome.com/a8af0967c4.js" crossorigin="anonymous"></script>

    {{-- immagine nella scheda pagina --}}
    <link rel="website icon" type="png" href="/storage/img/logo.png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>VudkoStore</title>
</head>

<body>
    <x-nav/>

    <div class="min-vh-100">
        {{$slot}}
    </div>

    <x-footer/>
</body>
</html>
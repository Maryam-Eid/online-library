<!doctype html>
<html class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student | {{ $title ?? '' }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="icon" href="{{ asset('assets/imgs/logo.png') }}" type="image/png">
    @vite('resources/css/app.css')
</head>
<body class="h-full">

{{ $slot }}

<script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</body>
</html>

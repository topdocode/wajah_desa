<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<title>
    {{ $globalSetting['title'] }}
</title>
<meta name="description" content="{{ $globalSetting['description'] }}" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .gradient {
        background: linear-gradient(90deg, #d53369 0%, #daae51 100%);
    }
</style>
@vite(['resources/css/app.css', 'resources/js/app.js'])

@isset($popups)
    @if (count($popups) > 0)
        @vite('resources/js/popup.js')
    @endif
@endisset
@yield('header')

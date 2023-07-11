<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>{{ $title }}</title>
</head>

<body>
    <!-- navbar star -->
    @include('home.navbar')
    <!-- navbar end -->

    <!-- hero start -->
    @include('home.hero')
    <!-- hero End -->

    <!-- about start -->
    @include('home.about')
    <!-- about end -->

    <!-- portofolio start -->
    @include('home.portofolio')
    <!-- portofolio end -->

    <!-- client start -->
    @include('home.client')
    <!-- client end -->

    <!-- blog start -->
    @include('home.blog')
    <!-- blog end -->

    <!-- kontak start -->
    @include('home.kontak')
    <!-- kontak end -->

    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->

    <!-- backto top -->
    <a href="#home"
        class="hidden h-14 w-14 bg-primary rounded-full fixed z-[9999] bottom-4 right-4 p-4 justify-center items-center hover:animate-pulse"
        id="to-top">
        <span class="block h-5 w-5 border-t-2 border-l-2 rotate-45 mt-2"></span>
    </a>
    <!-- backto end -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>

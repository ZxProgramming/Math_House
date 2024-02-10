
    <!doctype html>
    <html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Lesson | Edurock - Education LMS Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        <!-- Place favicon.ico in the root directory -->

        <!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('student/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/aos.min.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/icofont.min.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/plugins_plyr.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/style.css') }}">


        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia(
                    "(prefers-color-scheme: dark)").matches)) {
                document.documentElement.classList.add("is_dark");
            }
            if (localStorage.getItem("theme-color") === "light") {
                document.documentElement.classList.remove("is_dark");
            }
        </script>

    </head>


    <body class="body__wrapper">
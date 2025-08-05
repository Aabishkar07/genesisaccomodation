<!DOCTYPE html>
<html lang="{{ $page->language ?? 'en' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Accomodation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="" type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    </style>
    <style>
        body {
            font-family: "Montserrat", serif !important;
            font-weight: 400;
            font-style: normal;
        }
    </style>
</head>

<body>
    <div class="">
        @include('frontend.layout.navbar')
        <div class="">
            @yield('body')
        </div>

        <div class="">
            @include('frontend.layout.footer')
        </div>

    </div>
</body>

</html>

<script src="https://cdn.tailwindcss.com"></script>


<script>
    tailwind.config = {
        theme: {
            extend: {

                colors: {
                    primary: '#1074b4',
                    oldprimary: '#1074b4',
                    secondary: '#10142c',
                }
            },
            screens: {
                'xs': '320px',
                'sm': '640px',
                'md': '768px',
                'lg': '1024px',
                'xl': '1280px',
                '2xl': '1536px',
                '1299px': '1299px',
            },
        }
    }
</script>

<style>
    ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #555454;
        border-radius: 3px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: #555454;
    }

    ::-webkit-scrollbar-track {
        background-color: #e2dddf;
    }
</style>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>TechTastic | @yield("title")</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
{{--        <link href="{{ mix('css/app.css') }}" rel="stylesheet">--}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tiny.cloud/1/p21svzm9t3csf1sg28v8rfz7ng5e3bs7ar839m8kkti380tn/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <!-- Page Content -->
        <main>
            <div class="min-h-screen bg-gray-100">
                <x-dashboard.nav></x-dashboard.nav>
                <x-dashboard.aside></x-dashboard.aside>

                <div class="p-4 sm:ml-64">
                    <div class="p-4  border-2 border-gray-200 border-dashed rounded-lg mt-14">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </main>

        @stack('modals')

        @livewireScripts

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
{{--        <script>--}}
{{--            tinymce.init({--}}
{{--                selector: '#postbody',--}}
{{--                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',--}}
{{--                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',--}}
{{--                tinycomments_mode: 'embedded',--}}
{{--                tinycomments_author: 'Author name',--}}
{{--                mergetags_list: [--}}
{{--                    { value: 'First.Name', title: 'First Name' },--}}
{{--                    { value: 'Email', title: 'Email' },--}}
{{--                ]--}}
{{--            });--}}
{{--        </script>--}}



    </body>
</html>

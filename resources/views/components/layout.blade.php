<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
        {{-- <link rel="icon" href="images/favicon.ico" /> --}}

        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.tailwindcss.com"></script>

        <title>Budgeting App</title>
    </head>
    <body>
        <div class="flex font-custom">

            @auth
                <div class="max-w-2xl mx-auto w-1/5 h-screen bg-gray-800"></div>
                @include('partials._nav')
            @endauth
            
            <div class="w-full">
            @auth
                @include('partials._hero')
            @endauth

                <main class="p-10">
                    {{$slot}}
                </main>
            </div>
        </div>
        {{-- <footer class="footer">
            <p>Copyright &copy; 2022, All Rights reserved</p>
        </footer> --}}

        @include('partials._flash-message')
    </body>
</html>
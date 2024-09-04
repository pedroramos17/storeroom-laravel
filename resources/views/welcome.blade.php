<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="favicon.svg" type="image/svg+xml" />
        <title>Bem-vindo ao estoque!</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="">
        <div class="grid grid-cols-2 max-lg:grid-cols-1">
            <div class="bg-zinc-950 grid place-content-around h-screen gap-10 text-center">
                <div class="absolute flex items-center">
                    <img
                        src="./assets/logo.svg"
                        alt="logo"
                        width="30"
                        class="m-6"
                    />
                    <p class="font-medium text-xl text-white">Estoque</p>
                </div>
                
                <h1 class="text-3xl text-white">Bem-vindo ao estoque!</h1>
                @auth
                <a
                href="{{ url('/dashboard') }}"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500 border border-2 rounded border-gray-400 p-2 hover:border-gray-800"
                >Dashboard</a
                >
                @else
                @if (Route::has('login'))
                <div class="space-x-2 p-6">
                        <h2 class="mb-6 text-xl text-white">
                        Antes de entrar faça login ou se cadastre.
                        </h2>
                        <a
                        href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500 border border-2 rounded border-gray-400 p-2 hover:border-gray-800"
                        >Entre</a>
                @endif
                    @if (Route::has('register'))
                        <span class="text-gray-300">ou</span>
                        <a
                            href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-600 border border-2 rounded border-gray-400 p-2 hover:border-gray-800"
                            >Cadastre</a>
                </div>
                    @endif
                    
                    @endauth
            </div>
            <div class="bg-zinc-400 max-lg:none">

            </div>
        </div>
    </body>
</html>

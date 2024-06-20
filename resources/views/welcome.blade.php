<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg" style="background-image: url('../../assets/banner_background.jpg'); background-color: #1f2937; background-size: cover; background-position: center;">
                <p class="text-lg text-gray-700 font-semibold p-2" style="color: #fff;">
                    Bem-vindo a minha loja virtual!
                </p>
                <a class="p-3 underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ url('login') }}">Login</a><br><br>
                <a class="p-3 underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ url('register') }}">Registro</a><br><br>
                <a class="p-3 underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ url('dashboard') }}">Aqui a lista dos meus produtos!</a>
            </div>
        </div>
    </div>
</x-guest-layout>

<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">

        <br>
        <a class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150" href="{{ url('/products') }}">Voltar</a>
        <a class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-100 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-900 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150" href="{{ url('/types/new') }}">Cadastrar um tipo de produto</a>
        <br><br>
        <table class="min-w-full bg-white text-center">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b-2 border-gray-200">Nome</th>
                    <th class="py-2 px-4 border-b-2 border-gray-200">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($types as $type)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $type['name'] }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            <a class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150" href="{{ url('/types/update', ['id' => $type['id']]) }}">Editar</a>
                            <a class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" href="{{ url('/types/delete', ['id' => $type['id']]) }}" onclick="return confirma(this)">Deletar</a>
                        </td>
                    </tr>
                @endforeach
                @if(session('success'))
                    <div class="bg-green-500 text-white p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-500 text-white p-4 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
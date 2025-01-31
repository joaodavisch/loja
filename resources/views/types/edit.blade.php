<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
        <form action="{{ url('types/update') }}" method="POST" class="space-y-4">
            @csrf
            <!-- Campo oculto passando o ID como parâmetro no request -->
            <input type="hidden" name="id" value="{{ $type['id'] }}">
            <br>
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-2 w-full" type="text" name="name" :value="$type->name" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-3 flex justify-between">
                <a class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150" href="{{ url('/types') }}">Voltar</a>
                <x-primary-button type="submit">Salvar</x-primary-button>
            </div>

        </form>
    </div>
</x-app-layout>
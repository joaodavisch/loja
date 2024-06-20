<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
        <form action="{{ url('products/update') }}" method="POST" class="space-y-4">
            @csrf
            <!-- Campo oculto passando o ID como parâmetro no request -->
            <input type="hidden" name="id" value="{{ $product['id'] }}">
            <br>
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-2 w-full" type="text" name="name" :value="$product->name" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="description" :value="__('Descrição')" />
                <x-text-input id="description" class="block mt-2 w-full" type="text" name="description" :value="$product->description" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="quantity" :value="__('Quantidade')" />
                <x-text-input id="quantity" class="block mt-2 w-full" type="number" name="quantity" :value="$product->quantity" required />
                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="price" :value="__('Preço')" />
                <x-text-input id="price" class="block mt-2 w-full" type="number" name="price" :value="$product->price" required />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="type_id" :value="__('Tipo')" />
                <select id="type_id" name="type_id" class="border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    @foreach($types as $type)
                    <option {{ $product->type_id == $type->id ? "selected" : "" }} value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-3 flex justify-between">
                <a class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150" href="{{ url('/products') }}">Voltar</a>
                <x-primary-button type="submit">Salvar</x-primary-button>
            </div>

        </form>
    </div>
</x-app-layout>
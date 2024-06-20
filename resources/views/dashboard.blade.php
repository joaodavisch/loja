<x-app-layout>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <hr class="mb-4 space-x-4 py-1 ">
                    <div class="mb-4 space-x-4 ">
                    @foreach($types as $type)
                        <a href="#" data-type-id="{{ $type->id }}"
                        
                           class="filter-btn inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150" href="{{ url('/products') }}">
                            {{ $type->name }}
                        <hr>
                    @endforeach
                    <a href="#" data-type-id="all"
                       class="filter-btn bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                        Mostrar Todos
                    </a>
                </div>
                <hr class="mb-4 space-x-4 py-1">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <p>Tabela de produtos</p>

                <!-- Barra de Pesquisa -->
                <div class="mb-4">
                    <input type="text" id="searchInput" class="border border-gray-300 rounded-md px-4 py-2 w-full" placeholder="Pesquisar produtos...">
                </div>

                <!-- Botões de Filtro por Type -->
                

                <!-- Layout de Produtos -->
                <div class="grid grid-cols-2 gap-4" id="productsContainer">
                    @foreach($products as $product)
                        <div class="product-item bg-gray-200 p-4 shadow-md rounded-md" data-type="{{ $product->type_id }}">
                            <p><strong>Nome:</strong> {{ $product->name }}</p>
                            <p><strong>Preço:</strong> R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                            <p><strong>Quantidade:</strong> {{ $product->quantity }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        const searchInput = document.getElementById('searchInput');
        const productItems = document.querySelectorAll('.product-item');
        const filterBtns = document.querySelectorAll('.filter-btn');

        // Adiciona um ouvinte de evento ao input de pesquisa
        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.trim().toLowerCase();

            productItems.forEach(item => {
                const productName = item.querySelector('p:nth-child(1)').textContent.toLowerCase();

                if (productName.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        // Adiciona um ouvinte de evento aos botões de filtro por type
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const typeId = btn.getAttribute('data-type-id');

                productItems.forEach(item => {
                    const itemType = item.getAttribute('data-type');

                    if (typeId === 'all' || typeId === itemType) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
</x-app-layout>

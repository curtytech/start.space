<div class="overflow-hidden">
    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 px-4 py-3 text-center rounded-t-xl">
        <h3 class="text-lg font-bold text-white">Atalhos Rápidos</h3>
        <p class="text-blue-100 text-sm mt-1">Acesse rapidamente suas ferramentas favoritas</p>
    </div>

    <!-- Category Filter -->
    @if($categories->count() > 1)
    <div class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800">
        <div class="flex flex-wrap gap-1">
            <button onclick="showAllItems()" class="category-filter active px-3 py-1 rounded text-xs font-medium transition-all duration-200 bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300">
                Todos
            </button>
            @foreach($categories as $category)
                <button onclick="showCategory('{{ $category }}')" class="category-filter px-3 py-1 rounded text-xs font-medium transition-all duration-200 bg-gray-100 text-gray-700 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                    {{ $category }}
                </button>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Menu Items Grid -->
    <div class="px-4">
        <x-ad-banner :slot="config('services.adsense.slot_main')" />
    </div>

    <div class="p-4 max-h-96 overflow-y-auto">
        @if($menuItems->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                @foreach($menuItems as $item)
                    <a href="{{ $item->url }}" 
                       @if($item->open_in_new_tab) target="_blank" rel="noopener noreferrer" @endif
                       class="menu-item group block bg-gray-50 dark:bg-gray-800 rounded-lg p-3 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200 border border-gray-200 dark:border-gray-600 hover:border-blue-300 dark:hover:border-blue-600 hover:shadow-sm" 
                       data-category="{{ $item->category }}">
                        <!-- Icon and Title -->
                        <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0 w-8 h-8 rounded-lg flex items-center justify-center">                                    
                                    <img src="https://www.google.com/s2/favicons?domain={{ $item->url }}" alt="">
                                </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-200 truncate">
                                        {{ $item->title }}
                                    </h3>
                                    @if($item->open_in_new_tab)
                                        <svg class="w-3 h-3 text-gray-400 group-hover:text-blue-500 flex-shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                        </svg>
                                    @endif
                                </div>
                                @if($item->subtitle)
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 truncate">
                                        {{ $item->subtitle }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center ">
                <div class="w-12 h-12 mx-auto mb-3 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <h3 class="text-sm font-medium text-gray-900 dark:text-white mb-2">Nenhum atalho disponível</h3>
                <p class="text-xs text-gray-500 dark:text-gray-400 mb-3">Adicione alguns atalhos no painel administrativo.</p>
                <a href="/admin" class="inline-flex items-center px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 text-xs font-medium">
                    Fazer Login
                </a>
            </div>
        @endif
    </div>
</div>

<script>
function showAllItems() {
    // Remove active class from all buttons
    document.querySelectorAll('.category-filter').forEach(btn => {
        btn.classList.remove('active', 'bg-blue-100', 'text-blue-700', 'dark:bg-blue-900', 'dark:text-blue-300');
        btn.classList.add('bg-gray-100', 'text-gray-700', 'dark:bg-gray-800', 'dark:text-gray-300');
    });
    
    // Add active class to "Todos" button
    event.target.classList.add('active', 'bg-blue-100', 'text-blue-700', 'dark:bg-blue-900', 'dark:text-blue-300');
    event.target.classList.remove('bg-gray-100', 'text-gray-700', 'dark:bg-gray-800', 'dark:text-gray-300');
    
    // Show all items
    document.querySelectorAll('.menu-item').forEach(item => {
        item.style.display = 'block';
        item.style.opacity = '0';
        setTimeout(() => {
            item.style.opacity = '1';
        }, 50);
    });
}

function showCategory(category) {
    // Remove active class from all buttons
    document.querySelectorAll('.category-filter').forEach(btn => {
        btn.classList.remove('active', 'bg-blue-100', 'text-blue-700', 'dark:bg-blue-900', 'dark:text-blue-300');
        btn.classList.add('bg-gray-100', 'text-gray-700', 'dark:bg-gray-800', 'dark:text-gray-300');
    });
    
    // Add active class to clicked button
    event.target.classList.add('active', 'bg-blue-100', 'text-blue-700', 'dark:bg-blue-900', 'dark:text-blue-300');
    event.target.classList.remove('bg-gray-100', 'text-gray-700', 'dark:bg-gray-800', 'dark:text-gray-300');
    
    // Filter items
    document.querySelectorAll('.menu-item').forEach(item => {
        const itemCategory = item.getAttribute('data-category');
        if (itemCategory === category) {
            item.style.display = 'block';
            item.style.opacity = '0';
            setTimeout(() => {
                item.style.opacity = '1';
            }, 50);
        } else {
            item.style.opacity = '0';
            setTimeout(() => {
                item.style.display = 'none';
            }, 200);
        }
    });
}

// Add smooth transitions
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.menu-item').forEach(item => {
        item.style.transition = 'opacity 0.2s ease-in-out, transform 0.2s ease-in-out';
    });
});
</script>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.menu-item:hover {
    transform: translateY(-2px);
}

.category-filter.active {
    box-shadow: 0 2px 4px rgba(59, 130, 246, 0.2);
}

@media (prefers-color-scheme: dark) {
    .category-filter.active {
        box-shadow: 0 2px 4px rgba(59, 130, 246, 0.3);
    }
}
</style>
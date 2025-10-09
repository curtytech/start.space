<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Starter Page') }}</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <!-- Header -->
        <header class="bg-white dark:bg-gray-900 shadow-sm border-b border-gray-200 dark:border-gray-700">
            <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-8">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-gray-900 dark:text-white">{{ config('app.name', 'Starter Page') }}</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition-colors duration-200">
                        Início
                    </a>
                    
                    <!-- Dropdown Atalhos -->
                    <div class="relative" id="atalhos-dropdown">
                        <button type="button" id="atalhos-button" class="flex items-center text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition-colors duration-200">
                            Atalhos
                            <svg class="ml-1 w-4 h-4 transition-transform duration-200" id="atalhos-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        

                        
                        
                        <!-- Dropdown Menu -->
                        <div id="atalhos-menu" class="absolute top-full left-0 mt-2 w-96 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-200 dark:border-gray-700 opacity-0 invisible transform scale-95 transition-all duration-200 z-50">
                            <x-mega-menu />
                        </div>
                    </div>
                    
                    <a href="/admin" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition-colors duration-200">
                        Admin
                    </a>
                </div>

                <!-- Right Side Actions -->
                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/admin') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition-colors duration-200">
                                Login
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                                    Registrar
                                </a>
                            @endif
                        @endauth
                    @endif

                    <!-- Mobile Menu Button -->
                    <button type="button" id="mobile-menu-button" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200">
                        <span class="sr-only">Abrir menu</span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </nav>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900">
                <div class="px-6 py-4 space-y-3">
                    <a href="/" class="block text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition-colors duration-200">
                        Início
                    </a>
                    
                    <!-- Mobile Dropdown Atalhos -->
                    <div class="block">
                        <button type="button" id="mobile-atalhos-button" class="flex items-center justify-between w-full text-left text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition-colors duration-200">
                            Atalhos
                            <svg class="w-4 h-4 transition-transform duration-200" id="mobile-atalhos-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="mobile-atalhos-menu" class="mt-2 hidden">
                            <x-mega-menu />
                        </div>
                    </div>
                    
                    <a href="/admin" class="block text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition-colors duration-200">
                        Admin
                    </a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/admin') }}" class="block w-full text-left px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="block text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition-colors duration-200">
                                Login
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="block w-full text-left px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                                    Registrar
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </header>

            <section class="py-12 bg-gray-50 dark:bg-gray-800">
                <div class="max-w-5xl mx-auto px-6 lg:px-8">                 
                    
                    <!-- Google iframe Container -->
                    <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
                        <div class="bg-gradient-to-r from-blue-600 to-purple-600 px-6 py-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="flex space-x-2">
                                        <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                                        <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                                        <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                                    </div>
                                    <span class="text-white font-medium">Google Search</span>
                                </div>
                                <div class="text-white text-sm opacity-75">
                                    google.com
                                </div>
                            </div>
                        </div>
                        
                        <!-- iframe Container with responsive aspect ratio -->
                        <div class="relative w-full" style="padding-bottom: 35%; /* Reduced height for more compact view */">
                            <iframe 
                                src="https://www.google.com/webhp?igu=1" 
                                class="absolute top-0 left-0 w-full h-full border-0"
                                title="Google Search"
                                loading="lazy"
                                sandbox="allow-scripts allow-same-origin allow-forms allow-popups allow-popups-to-escape-sandbox"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        
                        <!-- Fallback message -->
                        <noscript>
                            <div class="p-8 text-center">
                                <p class="text-gray-600 dark:text-gray-400 mb-4">
                                    Para usar esta funcionalidade, você precisa habilitar JavaScript em seu navegador.
                                </p>
                                <a href="https://www.google.com" target="_blank" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                                    Abrir Google em nova aba
                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                </a>
                            </div>
                        </noscript>
                    </div>
                    
                    <!-- Additional info -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            💡 Dica: Use Ctrl+K (Cmd+K no Mac) para focar rapidamente na barra de pesquisa
                        </p>
                    </div>
                </div>
            </section>

        <!-- Main Content -->
        <main class="min-h-screen bg-gray-50 dark:bg-gray-900">
            <!-- Hero Section -->
            <section class="bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800 py-20">
                <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
                    <h1 class="text-4xl md:text-6xl font-bold text-gray-900 dark:text-white mb-6">
                        Bem-vindo ao 
                        <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            {{ config('app.name', 'Laravel') }}
                        </span>
                    </h1>
                    <p class="text-xl text-gray-600 dark:text-gray-300 mb-8 max-w-3xl mx-auto">
                        Sua página inicial personalizada com atalhos rápidos e acesso fácil às suas ferramentas favoritas.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#mega-menu" class="inline-flex items-center px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                            Explorar Atalhos
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                        @if (Route::has('login'))
                            @guest
                                <a href="{{ route('login') }}" class="inline-flex items-center px-8 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-200 font-medium">
                                    Fazer Login
                                </a>
                            @endguest
                        @endif
                    </div>
                </div>
            </section>



            <!-- Mega Menu Section -->
            <section id="mega-menu" class="py-16">
                <div class="max-w-7xl mx-auto px-6 lg:px-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                            Atalhos Rápidos
                        </h2>
                        <p class="text-lg text-gray-600 dark:text-gray-300">
                            Acesse rapidamente suas ferramentas e recursos favoritos
                        </p>
                    </div>
                    
                    <!-- Mega Menu Component -->
                    <x-mega-menu />
                </div>
            </section>

            <!-- Google Search Section -->
        

            <!-- Footer -->
            <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 py-12">
                <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
                    <div class="flex items-center justify-center space-x-2 mb-4">
                        <div class="w-6 h-6 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">{{ config('app.name', 'Laravel') }}</span>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        Desenvolvido com Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </p>
                    <div class="flex justify-center space-x-6">
                        <a href="/admin" class="text-gray-500 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                            Admin Panel
                        </a>
                        <a href="https://laravel.com/docs" target="_blank" class="text-gray-500 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                            Documentação
                        </a>
                        <a href="https://github.com/laravel/laravel" target="_blank" class="text-gray-500 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                            GitHub
                        </a>
                    </div>
                </div>
            </footer>
        </main>

        <script>
            // Mobile menu toggle
            document.getElementById('mobile-menu-button').addEventListener('click', function() {
                const mobileMenu = document.getElementById('mobile-menu');
                mobileMenu.classList.toggle('hidden');
            });

            // Shortcuts dropdown toggle (Desktop)
            const shortcutsButton = document.getElementById('shortcuts-dropdown-button');
            if (shortcutsButton) {
                shortcutsButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    const dropdown = document.getElementById('shortcuts-dropdown');
                    if (dropdown) {
                        dropdown.classList.toggle('hidden');
                        
                        // Close dropdown when clicking outside
                        document.addEventListener('click', function closeDropdown(event) {
                            if (!dropdown.contains(event.target) && !e.target.contains(event.target)) {
                                dropdown.classList.add('hidden');
                                document.removeEventListener('click', closeDropdown);
                            }
                        });
                    }
                });
            }

            // Shortcuts dropdown toggle (Mobile)
            const mobileShortcutsButton = document.getElementById('mobile-shortcuts-dropdown-button');
            if (mobileShortcutsButton) {
                mobileShortcutsButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    const dropdown = document.getElementById('mobile-shortcuts-dropdown');
                    if (dropdown) {
                        dropdown.classList.toggle('hidden');
                        
                        // Close dropdown when clicking outside
                        document.addEventListener('click', function closeDropdown(event) {
                            if (!dropdown.contains(event.target) && !e.target.contains(event.target)) {
                                dropdown.classList.add('hidden');
                                document.removeEventListener('click', closeDropdown);
                            }
                        });
                    }
                });
            }

            // Close dropdowns when pressing Escape key and handle Google search shortcut
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    const dropdown = document.getElementById('shortcuts-dropdown');
                    const mobileDropdown = document.getElementById('mobile-shortcuts-dropdown');
                    
                    if (dropdown) dropdown.classList.add('hidden');
                    if (mobileDropdown) mobileDropdown.classList.add('hidden');
                }
                
                // Ctrl+K or Cmd+K to focus on Google search
                if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                    e.preventDefault();
                    
                    // Scroll to Google section
                    const googleSection = document.querySelector('section:has(iframe[src*="google.com"])');
                    if (googleSection) {
                        googleSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        
                        // Try to focus on the search input inside the iframe (may not work due to cross-origin restrictions)
                        setTimeout(() => {
                            const iframe = googleSection.querySelector('iframe');
                            if (iframe) {
                                try {
                                    iframe.focus();
                                } catch (e) {
                                    // Cross-origin restrictions prevent focusing, but scrolling still works
                                    console.log('Scrolled to Google search section');
                                }
                            }
                        }, 500);
                    }
                }
            });

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Dark mode detection and handling
            if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.classList.add('dark');
            }
        </script>

        <!-- Botões Flutuantes das Redes Sociais -->
        <x-floating-social-buttons />
    </body>
</html>
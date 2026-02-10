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

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4329166318141941" crossorigin="anonymous"></script>
    <meta name="google-adsense-account" content="ca-pub-4329166318141941"></meta>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-white text-gray-900 dark:bg-black dark:text-white/50">
    <!-- Header -->
    <header class="bg-white dark:bg-gray-900 shadow-sm border-b border-gray-200 dark:border-gray-700">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-8">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-2">
                    <div class="flex items-center justify-center animate-pulse gap-2">
                        <img src="{{ asset('img/LogoStartSpaceWhite.png') }}" alt="Logo Start Space" class="w-10 h-8  ">
                        <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent ">{{ config('app.name', 'Starter Page') }}</span>
                    </div>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="flex hidden md:flex items-center space-x-8 justify-end">
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
            </div>

            <!-- Right Side Actions -->
            <!-- Dentro da header, no bloco "Right Side Actions" -->
            <div class="flex items-center space-x-4">
                @guest
                <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition-colors duration-200">
                    Login
                </a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                    Registrar
                </a>
                @endif
                @endguest

                <!-- Mobile Menu Button -->
                <button type="button" id="mobile-menu-button" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200">
                    <span class="sr-only">Abrir menu</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                @auth
                <a href="{{ url('/admin') }}" class="hidden md:inline-flex items-center gap-2 px-4 py-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:from-blue-700 hover:to-purple-700 transition-colors duration-200 font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                    </svg>
                    Dashboard
                </a>
                @endauth
                <button type="button" id="theme-toggle" class="inline-flex items-center px-3 py-2 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200">
                    <span id="theme-toggle-icon-sun" class="mr-2 hidden">
                        <i class="fa-solid fa-sun"></i>
                    </span>
                    <span id="theme-toggle-icon-moon" class="mr-2 hidden">
                        <i class="fa-solid fa-moon"></i>
                    </span>
                    <span id="theme-toggle-label" class="text-sm">Tema</span>
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
                    Dashboard
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

    <!-- Main Content -->
    <main class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <section class="bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800 py-6">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
                <div class="hidden md:block">
                    <div class="flex flex-row items-center justify-center gap-3 animate-bounce" style="animation-duration: 4s;">
                        <img src="{{ asset('img/LogoStartSpaceWhite.png') }}" alt="Logo Start Space" class="w-15 h-13 ">
                        <h1 class="text-2xl md:text-6xl font-bold text-gray-900 dark:text-white ">
                            Bem-vindo ao
                            <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent ">
                                Start.Space </span>
                        </h1>
                    </div>
                </div>
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-4 max-w-3xl mx-auto hidden md:block">
                    Sua página inicial personalizada com atalhos rápidos e acesso fácil às suas ferramentas favoritas.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#mega-menu" class="inline-flex items-center justify-center px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium mx-auto">
                        Explorar Atalhos
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        <section class="py-6 bg-gray-50 dark:bg-gray-800">

            <div class="max-w-5xl mx-auto px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700 ">
                    <div class="bg-gradient-to-r from-blue-600 to-purple-600 px-6 py-1 hidden md:block">
                        <div class="flex items-center justify-between">
                            <div class="flex flex-row items-center space-x-3">
                                <div class="flex space-x-2">
                                    <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                                    <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                                    <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                                </div>
                                <span class="text-white font-medium">Google Search</span>
                            </div>
                            <div class="flex justify-end items-center gap-6 ">
                                <a href="https://mail.google.com/" target="_blank" rel="noopener noreferrer"
                                    class="text-gray-300 hover:text-white dark:text-gray-300 dark:hover:text-white">
                                    Gmail
                                </a>
                                <a href="https://www.google.com/imghp?hl=pt-BR" target="_blank" rel="noopener noreferrer"
                                    class="text-gray-300 hover:text-white dark:text-gray-300 dark:hover:text-white">
                                    Imagens
                                </a>
                                <a href="https://about.google/products/" target="_blank" rel="noopener noreferrer"
                                    class="text-gray-300 hover:text-white dark:text-gray-300 dark:hover:text-white">
                                    Produtos
                                </a>

                                <a href="https://accounts.google.com/ServiceLogin" target="_blank" rel="noopener noreferrer"
                                    class="px-4 py-2 rounded-full bg-blue-200 text-blue-900 font-medium hover:bg-blue-300 ">
                                    Fazer login
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- UI estilo Google -->
                    <div class="px-6 py-3 bg-gray-50 dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex flex-col items-center">
                            <div class="text-6xl font-semibold tracking-tight text-gray-900 dark:text-white">Google</div>
                            <form id="google-search-form" action="https://www.google.com/search" method="GET" target="_blank" rel="noopener noreferrer" class="mt-8 w-full max-w-3xl">
                                <label for="google-search-input" class="sr-only">Pesquisar no Google</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-300">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </span>

                                    <input
                                        id="google-search-input"
                                        name="q"
                                        type="text"
                                        placeholder="Pesquisar no Google"
                                        class="w-full h-14 pl-12 pr-28 rounded-full bg-gray-100 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 outline-none"
                                        autocomplete="off" />

                                    <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center gap-4 text-gray-400 dark:text-gray-30 hidden md:block0">
                                        <button type="button" class="p-1" aria-label="Teclado">
                                            <i class="fa-solid fa-keyboard"></i>
                                        </button>
                                        <button type="button" class="p-1" aria-label="Microfone">
                                            <i class="fa-solid fa-microphone"></i>
                                        </button>
                                        <button type="button" class="p-1" aria-label="Pesquisa por imagem">
                                            <i class="fa-solid fa-camera"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-6 flex gap-3 justify-center">
                                    <button type="submit" class="px-5 py-2 rounded-md bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-700">
                                        Pesquisa Google
                                    </button>
                                    <button type="button" id="feeling-lucky" class="px-5 py-2 rounded-md bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-700">
                                        Estou com sorte
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>

            </div>

        </section>

        <section id="mega-menu" class="py-4">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <x-mega-menu />
            </div>
        </section>

        @auth
        <section class="py-4">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 flex justify-center">
                <a
                    href="{{ url('admin/mega-menu-items') }}"
                    class="inline-flex items-center gap-2 px-6 py-3 
                        bg-gradient-to-r from-blue-600 to-purple-600 
                        text-white rounded-xl shadow-md 
                        hover:from-blue-700 hover:to-purple-700 
                        transition-all duration-200 font-medium"
                >
                    <i class="fa-solid fa-pen-to-square"></i>
                    Editar atalhos
                </a>
            </div>
        </section>
        @endauth


        <!-- <section id="banner" class="py-4">
            <x-ad-banner :slot="config('services.adsense.slot_main')" />
        </section> -->

        <!-- Footer -->
        <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 py-8">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
                <div class="flex items-center justify-center space-x-2 mb-4">
                    <!-- <div class="w-6 h-6 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">                        -->
                    <img src="{{ asset('img/LogoStartSpaceWhite.png') }}" alt="Logo Start Space" class="w-9 h-8">
                    <!-- </div> -->
                    <span class="text-lg font-semibold text-gray-900 dark:text-white">Start Space </span>
                </div>
                <p class="text-gray-600 dark:text-gray-400 ">
                    Desenvolvido por
                    <a href="https://phelipecurty.vercel.app" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline">
                        Phelipe Curty
                    </a>
                </p>
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

            // Ctrl+K or Cmd+K para focar na barra de pesquisa do Google
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();

                const input = document.getElementById('google-search-input');
                const section = input ? input.closest('section') : document.querySelector('section:has(iframe[src*="google.com"])');
                if (section) {
                    section.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
                setTimeout(() => {
                    if (input) input.focus();
                }, 300);
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
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
<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });

    // Toggle do dropdown "Atalhos" (Desktop) via hover
    const atalhosButton = document.getElementById('atalhos-button');
    const atalhosMenu = document.getElementById('atalhos-menu');
    const atalhosArrow = document.getElementById('atalhos-arrow');
    const atalhosDropdown = document.getElementById('atalhos-dropdown');

    if (atalhosButton && atalhosMenu && atalhosArrow && atalhosDropdown) {
        const showAtalhos = () => {
            atalhosMenu.classList.remove('opacity-0', 'invisible', 'scale-95');
            atalhosMenu.classList.add('opacity-100', 'visible', 'scale-100');
            atalhosArrow.classList.add('rotate-180');
        };

        const hideAtalhos = () => {
            atalhosMenu.classList.remove('opacity-100', 'visible', 'scale-100');
            atalhosMenu.classList.add('opacity-0', 'invisible', 'scale-95');
            atalhosArrow.classList.remove('rotate-180');
        };

        // Abre ao passar o mouse e fecha ao sair do container
        atalhosDropdown.addEventListener('mouseenter', showAtalhos);
        atalhosDropdown.addEventListener('mouseleave', hideAtalhos);
    }

    // Toggle do dropdown "Atalhos" (Mobile)
    const mobileAtalhosButton = document.getElementById('mobile-atalhos-button');
    const mobileAtalhosMenu = document.getElementById('mobile-atalhos-menu');
    const mobileAtalhosArrow = document.getElementById('mobile-atalhos-arrow');

    if (mobileAtalhosButton && mobileAtalhosMenu && mobileAtalhosArrow) {
        mobileAtalhosButton.addEventListener('click', function(e) {
            e.preventDefault();
            mobileAtalhosMenu.classList.toggle('hidden');
            mobileAtalhosArrow.classList.toggle('rotate-180');
        });
    }

    // Alternância de Tema (Dark/Light) com persistência em localStorage
    function applyTheme(theme) {
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
        try {
            localStorage.setItem('theme', theme);
        } catch (e) {}

        const label = document.getElementById('theme-toggle-label');
        const sun = document.getElementById('theme-toggle-icon-sun');
        const moon = document.getElementById('theme-toggle-icon-moon');
        if (label && sun && moon) {
            label.textContent = theme === 'dark' ? 'Modo Escuro' : 'Modo Claro';
            sun.classList.toggle('hidden', theme === 'dark');
            moon.classList.toggle('hidden', theme !== 'dark');
        }
    }

    (function initTheme() {
        let stored = null;
        try {
            stored = localStorage.getItem('theme');
        } catch (e) {}

        const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        const theme = stored ? stored : (prefersDark ? 'dark' : 'light');
        applyTheme(theme);
    })();

    const themeToggleBtn = document.getElementById('theme-toggle');
    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', function() {
            const isDark = document.documentElement.classList.contains('dark');
            applyTheme(isDark ? 'light' : 'dark');
        });
    }
</script>
<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="google-site-verification" content="x4LmTsgqKF_sWsd8sDD7dmMxgKfvkC2YJbKd8FVcyRI" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Time&Date Tools - Free Online Calculators & Tools')</title>
    <meta name="description" content="@yield('meta_description', 'Free online age calculator, time duration tools, and date calculators. Get exact results with fun facts and life story statistics.')">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Time&Date Tools - Free Online Calculators & Tools')">
    <meta property="og:description" content="@yield('meta_description', 'Free online age calculator, time duration tools, and date calculators. Get exact results with fun facts and life story statistics.')">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'Time&Date Tools - Free Online Calculators & Tools')">
    <meta property="twitter:description" content="@yield('meta_description', 'Free online age calculator, time duration tools, and date calculators. Get exact results with fun facts and life story statistics.')">

    @stack('head')

    <!-- Global Schema.org -->
    <script type="application/ld+json">
    {
      "{{ '@' }}context": "https://schema.org",
      "{{ '@' }}type": "WebSite",
      "name": "Time&Date Tools",
      "url": "{{ url('/') }}",
      "potentialAction": {
        "{{ '@' }}type": "SearchAction",
        "target": "{{ url('/') }}/search?q={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>
    <script type="application/ld+json">
    {
      "{{ '@' }}context": "https://schema.org",
      "{{ '@' }}type": "Organization",
      "name": "Time&Date Tools",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('favicon.svg') }}"
    }
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    @stack('styles')

    <style>
        /* Drawer link stagger animation */
        .drawer-link { opacity: 0; transform: translateX(16px); transition: all 400ms var(--ease-out-expo); }
        .drawer-open .drawer-link { opacity: 1; transform: translateX(0); }
        .drawer-open .drawer-link:nth-child(1) { transition-delay: 80ms; }
        .drawer-open .drawer-link:nth-child(2) { transition-delay: 140ms; }
        .drawer-open .drawer-link:nth-child(3) { transition-delay: 200ms; }
        .drawer-open .drawer-link:nth-child(4) { transition-delay: 260ms; }
        .drawer-open .drawer-link:nth-child(5) { transition-delay: 320ms; }
        .drawer-open .drawer-link:nth-child(6) { transition-delay: 380ms; }

        /* Header scroll states */
        header[data-header] { transition: background-color 300ms, box-shadow 300ms, border-color 300ms; }
        header[data-header].is-scrolled {
            background-color: rgba(255,255,255,0.92) !important;
            backdrop-filter: blur(20px) saturate(180%);
            box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.04), 0 1px 2px -1px rgb(0 0 0 / 0.03);
            border-color: rgba(0,0,0,0.06) !important;
        }

        /* Back to top button */
        [data-back-to-top] {
            opacity: 0; transform: translateY(16px) scale(0.9); pointer-events: none;
            transition: opacity 400ms var(--ease-out-expo), transform 400ms var(--ease-out-expo);
        }
        [data-back-to-top].is-visible {
            opacity: 1; transform: translateY(0) scale(1); pointer-events: auto;
        }

        /* Nav link animated underline */
        .nav-link { position: relative; }
        .nav-link::after {
            content: ''; position: absolute; bottom: 0; left: 0; width: 100%; height: 2px;
            background-color: var(--color-secondary);
            transform: scaleX(0); transform-origin: left;
            transition: transform 350ms var(--ease-out-expo);
        }
        .nav-link:hover::after, .nav-link.is-active::after { transform: scaleX(1); }
    </style>
</head>
<body class="bg-background text-on-surface font-body-md text-body-md pt-16 antialiased">
    <!-- Ambient background blobs -->
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none" aria-hidden="true">
        <div class="absolute -top-[20%] -right-[10%] w-[600px] h-[600px] rounded-full bg-secondary/[0.04] blur-[100px] animate-[float_12s_ease-in-out_infinite]"></div>
        <div class="absolute top-[40%] -left-[10%] w-[500px] h-[500px] rounded-full bg-primary-fixed/[0.06] blur-[90px] animate-[float_14s_ease-in-out_infinite_reverse]"></div>
        <div class="absolute -bottom-[10%] right-[20%] w-[400px] h-[400px] rounded-full bg-secondary-fixed/[0.05] blur-[80px] animate-[float_16s_ease-in-out_infinite]"></div>
    </div>

    <style>
        @keyframes float {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(30px, -30px); }
        }
    </style>

    <!-- TopAppBar -->
    <header data-header class="fixed top-0 w-full z-50 bg-surface/85 backdrop-blur-xl border-b border-outline-variant/50 h-16 transition-all">
        <div x-data="{ open: false }" @keydown.escape.window="open = false; toggleBodyScroll(false)">
            <div class="flex justify-between items-center max-w-[1200px] mx-auto px-gutter h-full relative mt-2">
                <a href="{{ route('home') }}" class="font-h2 text-h2 font-bold text-primary dark:text-on-primary-fixed cursor-pointer transition-transform duration-300 hover:scale-[1.02]">
                    Time&amp;Date <span class="text-secondary">Tools</span>
                </a>
                <nav class="hidden md:flex items-center gap-stack-md h-full absolute left-1/2 -translate-x-1/2">
                    <a class="nav-link h-full flex items-center {{ request()->routeIs('home') ? 'is-active text-secondary' : 'text-on-surface-variant hover:text-primary' }} pb-1 pt-1 font-h3 text-h3 cursor-pointer transition-colors" href="{{ route('home') }}">Calculators</a>
                    <a class="nav-link h-full flex items-center {{ request()->routeIs('age-calculator') ? 'is-active text-secondary' : 'text-on-surface-variant hover:text-primary' }} pb-1 pt-1 font-h3 text-h3 cursor-pointer transition-colors" href="{{ route('age-calculator') }}">Age Calculator</a>
                    <a class="nav-link h-full flex items-center {{ request()->routeIs('about') ? 'is-active text-secondary' : 'text-on-surface-variant hover:text-primary' }} pb-1 pt-1 font-h3 text-h3 cursor-pointer transition-colors" href="{{ route('about') }}">About</a>
                    <a class="nav-link h-full flex items-center {{ request()->routeIs('contact') ? 'is-active text-secondary' : 'text-on-surface-variant hover:text-primary' }} pb-1 pt-1 font-h3 text-h3 cursor-pointer transition-colors" href="{{ route('contact') }}">Contact</a>
                </nav>
                <div class="hidden md:block">
                    <a href="{{ route('age-calculator') }}" class="inline-flex items-center gap-2 bg-secondary text-on-secondary px-5 py-2.5 rounded-xl font-h3 text-h3 hover:bg-secondary-container transition-all duration-300 shadow-sm hover:shadow-glow hover:-translate-y-0.5">
                        <span class="material-symbols-outlined text-lg">calculate</span>
                        Try Now
                    </a>
                </div>
                <button @click="open = !open; toggleBodyScroll(open)" class="md:hidden text-on-surface relative z-50 w-10 h-10 flex items-center justify-center rounded-xl hover:bg-surface-container-low transition-colors" :aria-expanded="open" aria-label="Toggle menu">
                    <span x-show="!open" class="material-symbols-outlined text-h1">menu</span>
                    <span x-show="open" class="material-symbols-outlined text-h1">close</span>
                </button>
            </div>

            <!-- Mobile Drawer -->
            <div x-show="open"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-40 md:hidden"
                 @click="open = false; toggleBodyScroll(false)">
                <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
            </div>
            <div x-show="open"
                 x-transition:enter="transition ease-out-expo duration-500"
                 x-transition:enter-start="translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="translate-x-0"
                 x-transition:leave-end="translate-x-full"
                 class="fixed top-0 right-0 bottom-0 w-[min(320px,85vw)] z-40 bg-surface-container-lowest shadow-2xl md:hidden flex flex-col"
                 :class="open ? 'drawer-open' : ''"
                 @click.stop>
                <div class="h-16 flex items-center px-6 border-b border-outline-variant/50">
                    <span class="font-h2 text-h2 font-bold text-primary">Menu</span>
                </div>
                <nav class="flex-1 flex flex-col p-6 gap-2">
                    <a href="{{ route('home') }}" @click="open = false; toggleBodyScroll(false)" class="drawer-link flex items-center gap-3 px-4 py-3 rounded-xl text-on-surface hover:bg-surface-container-low transition-colors {{ request()->routeIs('home') ? 'bg-secondary/5 text-secondary font-semibold' : '' }}">
                        <span class="material-symbols-outlined">calculate</span> Calculators
                    </a>
                    <a href="{{ route('age-calculator') }}" @click="open = false; toggleBodyScroll(false)" class="drawer-link flex items-center gap-3 px-4 py-3 rounded-xl text-on-surface hover:bg-surface-container-low transition-colors {{ request()->routeIs('age-calculator') ? 'bg-secondary/5 text-secondary font-semibold' : '' }}">
                        <span class="material-symbols-outlined">cake</span> Age Calculator
                    </a>
                    <a href="{{ route('about') }}" @click="open = false; toggleBodyScroll(false)" class="drawer-link flex items-center gap-3 px-4 py-3 rounded-xl text-on-surface hover:bg-surface-container-low transition-colors {{ request()->routeIs('about') ? 'bg-secondary/5 text-secondary font-semibold' : '' }}">
                        <span class="material-symbols-outlined">info</span> About
                    </a>
                    <a href="{{ route('contact') }}" @click="open = false; toggleBodyScroll(false)" class="drawer-link flex items-center gap-3 px-4 py-3 rounded-xl text-on-surface hover:bg-surface-container-low transition-colors {{ request()->routeIs('contact') ? 'bg-secondary/5 text-secondary font-semibold' : '' }}">
                        <span class="material-symbols-outlined">mail</span> Contact
                    </a>
                    <div class="border-t border-outline-variant/50 my-2"></div>
                    <a href="{{ route('privacy') }}" @click="open = false; toggleBodyScroll(false)" class="drawer-link flex items-center gap-3 px-4 py-3 rounded-xl text-on-surface-variant hover:bg-surface-container-low transition-colors">
                        <span class="material-symbols-outlined">shield</span> Privacy
                    </a>
                    <a href="{{ route('terms') }}" @click="open = false; toggleBodyScroll(false)" class="drawer-link flex items-center gap-3 px-4 py-3 rounded-xl text-on-surface-variant hover:bg-surface-container-low transition-colors">
                        <span class="material-symbols-outlined">gavel</span> Terms
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <main class="max-w-[1200px] mx-auto px-gutter py-section-gap space-y-section-gap relative">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="w-full mt-section-gap relative">
        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-secondary/40 to-transparent"></div>
        <div class="bg-primary-container dark:bg-surface-container-lowest">
            <div class="max-w-[1200px] mx-auto px-gutter py-16">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
                    <!-- Brand -->
                    <div class="space-y-4">
                        <a href="{{ route('home') }}" class="inline-block font-h2 text-h2 font-bold text-on-primary dark:text-primary transition-transform duration-300 hover:scale-[1.02]">
                            Time&amp;Date <span class="text-secondary">Tools</span>
                        </a>
                        <p class="text-on-primary-container/80 dark:text-on-surface/70 text-sm leading-relaxed max-w-[280px]">
                            Precision time and date calculators built with modern web technology. Free, private, and accurate tools for everyone.
                        </p>
                        <div class="flex items-center gap-3 pt-2">
                            <span class="inline-flex items-center gap-1.5 text-xs font-medium text-success bg-success/10 px-2.5 py-1 rounded-full">
                                <span class="w-1.5 h-1.5 rounded-full bg-success animate-pulse"></span>
                                All Systems Operational
                            </span>
                        </div>
                    </div>

                    <!-- Tools -->
                    <div>
                        <h4 class="text-on-primary dark:text-on-surface font-semibold text-sm uppercase tracking-wider mb-4">Tools</h4>
                        <ul class="space-y-3">
                            <li><a href="{{ route('age-calculator') }}" class="text-on-primary-container/80 dark:text-on-surface/70 hover:text-secondary dark:hover:text-secondary transition-colors text-sm">Age Calculator</a></li>
                            <li><span class="text-on-primary-container/40 dark:text-on-surface/40 text-sm cursor-default">Time Duration Calculator <span class="text-[10px] uppercase tracking-wider bg-on-primary-container/10 dark:bg-on-surface/10 px-1.5 py-0.5 rounded ml-1">Soon</span></span></li>
                            <li><span class="text-on-primary-container/40 dark:text-on-surface/40 text-sm cursor-default">Date Calculator <span class="text-[10px] uppercase tracking-wider bg-on-primary-container/10 dark:bg-on-surface/10 px-1.5 py-0.5 rounded ml-1">Soon</span></span></li>
                        </ul>
                    </div>

                    <!-- Company -->
                    <div>
                        <h4 class="text-on-primary dark:text-on-surface font-semibold text-sm uppercase tracking-wider mb-4">Company</h4>
                        <ul class="space-y-3">
                            <li><a href="{{ route('about') }}" class="text-on-primary-container/80 dark:text-on-surface/70 hover:text-secondary dark:hover:text-secondary transition-colors text-sm">About Us</a></li>
                            <li><a href="{{ route('contact') }}" class="text-on-primary-container/80 dark:text-on-surface/70 hover:text-secondary dark:hover:text-secondary transition-colors text-sm">Contact</a></li>
                            <li><a href="{{ route('privacy') }}" class="text-on-primary-container/80 dark:text-on-surface/70 hover:text-secondary dark:hover:text-secondary transition-colors text-sm">Privacy Policy</a></li>
                            <li><a href="{{ route('terms') }}" class="text-on-primary-container/80 dark:text-on-surface/70 hover:text-secondary dark:hover:text-secondary transition-colors text-sm">Terms of Service</a></li>
                        </ul>
                    </div>

                    <!-- Connect -->
                    <div>
                        <h4 class="text-on-primary dark:text-on-surface font-semibold text-sm uppercase tracking-wider mb-4">Connect</h4>
                        <ul class="space-y-3">
                            <li class="flex items-center gap-2 text-on-primary-container/80 dark:text-on-surface/70 text-sm">
                                <span class="material-symbols-outlined text-base">mail</span>
                                support@toolsite.com
                            </li>
                            <li class="flex items-center gap-2 text-on-primary-container/80 dark:text-on-surface/70 text-sm">
                                <span class="material-symbols-outlined text-base">schedule</span>
                                24-48h Response
                            </li>
                        </ul>
                        <div class="mt-4 p-4 bg-white/5 dark:bg-black/5 rounded-xl border border-white/10 dark:border-white/5">
                            <p class="text-xs text-on-primary-container/60 dark:text-on-surface/50 leading-relaxed">
                                Built with care using Laravel, Tailwind CSS, and Alpine.js.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="border-t border-on-primary/10 dark:border-outline-variant/50 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="text-on-primary-container/60 dark:text-on-surface/60 text-sm">
                        &copy; {{ date('Y') }} Time&amp;Date Tools. All rights reserved.
                    </div>
                    <div class="flex items-center gap-6 text-sm text-on-primary-container/60 dark:text-on-surface/60">
                        <a href="{{ route('privacy') }}" class="hover:text-secondary transition-colors">Privacy</a>
                        <a href="{{ route('terms') }}" class="hover:text-secondary transition-colors">Terms</a>
                        <a href="{{ route('sitemap') }}" class="hover:text-secondary transition-colors">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to top -->
    <button data-back-to-top onclick="window.scrollTo({top:0,behavior:'smooth'})" aria-label="Back to top" class="fixed bottom-6 right-6 z-40 w-12 h-12 rounded-full bg-surface/90 backdrop-blur-xl border border-outline-variant/50 shadow-lg flex items-center justify-center text-on-surface hover:text-secondary hover:-translate-y-0.5 transition-all duration-300">
        <span class="material-symbols-outlined">arrow_upward</span>
    </button>

    @stack('scripts')
</body>
</html>

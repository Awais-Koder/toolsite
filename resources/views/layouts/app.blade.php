<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Time&Date Tools - Free Online Calculators & Tools')</title>
    <meta name="description" content="@yield('meta_description', 'Free online age calculator, time duration tools, and date calculators. Get exact results with fun facts and life story statistics.')">
    
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
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet"/>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('app', {
                showComingSoon: false,
                openComingSoon() {
                    this.showComingSoon = true;
                },
                closeComingSoon() {
                    this.showComingSoon = false;
                }
            })
        })
        
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "inverse-primary": "#bec6e0",
                        "error": "#ba1a1a",
                        "tertiary-fixed-dim": "#dec29a",
                        "surface-container-lowest": "#ffffff",
                        "secondary": "#0051d5",
                        "surface-bright": "#f7f9fb",
                        "surface": "#f7f9fb",
                        "outline": "#76777d",
                        "primary": "#000000",
                        "on-error-container": "#93000a",
                        "surface-container-highest": "#e0e3e5",
                        "surface-tint": "#565e74",
                        "on-surface-variant": "#45464d",
                        "on-tertiary-fixed-variant": "#574425",
                        "surface-container-low": "#f2f4f6",
                        "surface-dim": "#d8dadc",
                        "on-secondary-fixed-variant": "#003ea8",
                        "on-secondary-container": "#fefcff",
                        "on-secondary": "#ffffff",
                        "on-primary-fixed-variant": "#3f465c",
                        "tertiary-container": "#271901",
                        "secondary-fixed-dim": "#b4c5ff",
                        "on-secondary-fixed": "#00174b",
                        "on-primary-container": "#7c839b",
                        "inverse-surface": "#2d3133",
                        "surface-variant": "#e0e3e5",
                        "tertiary": "#000000",
                        "on-tertiary-container": "#98805d",
                        "on-surface": "#191c1e",
                        "secondary-container": "#316bf3",
                        "on-tertiary": "#ffffff",
                        "surface-container-high": "#e6e8ea",
                        "tertiary-fixed": "#fcdeb5",
                        "primary-container": "#131b2e",
                        "primary-fixed": "#dae2fd",
                        "inverse-on-surface": "#eff1f3",
                        "primary-fixed-dim": "#bec6e0",
                        "on-primary": "#ffffff",
                        "error-container": "#ffdad6",
                        "outline-variant": "#c6c6cd",
                        "surface-container": "#eceef0",
                        "secondary-fixed": "#dbe1ff",
                        "on-tertiary-fixed": "#271901",
                        "background": "#f7f9fb",
                        "on-error": "#ffffff",
                        "on-primary-fixed": "#131b2e",
                        "on-background": "#191c1e"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "stack-md": "24px",
                        "gutter": "24px",
                        "base": "8px",
                        "container-max": "1200px",
                        "stack-sm": "12px",
                        "stack-lg": "40px",
                        "section-gap": "64px"
                    },
                    "fontFamily": {
                        "mono-data": ["JetBrains Mono"],
                        "h3": ["Inter"],
                        "body-md": ["Inter"],
                        "h1": ["Inter"],
                        "label-caps": ["Inter"],
                        "h2": ["Inter"],
                        "display": ["Inter"],
                        "body-lg": ["Inter"]
                    },
                    "fontSize": {
                        "mono-data": ["14px", {"lineHeight": "1.4", "fontWeight": "500"}],
                        "h3": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}],
                        "body-md": ["16px", {"lineHeight": "1.5", "fontWeight": "400"}],
                        "h1": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                        "label-caps": ["12px", {"lineHeight": "1.2", "letterSpacing": "0.05em", "fontWeight": "600"}],
                        "h2": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                        "display": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}]
                    }
                },
            },
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
        .flat-shadow {
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05), 0 2px 4px -2px rgb(0 0 0 / 0.05);
        }
    </style>
    <!-- favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    @stack('styles')
</head>
<body class="bg-background text-on-surface font-body-md text-body-md pt-16" x-data="{ showComingSoon: false }" x-on:open-coming-soon.window="showComingSoon = true">
    <!-- TopAppBar -->
    <header class="fixed top-0 w-full z-50 bg-surface dark:bg-surface-dim border-b border-outline-variant dark:border-outline shadow-sm h-16">
        <div class="flex justify-between items-center max-w-[1200px] mx-auto px-gutter h-full relative">
            <a href="{{ route('home') }}" class="font-h2 text-h2 font-bold text-primary dark:text-on-primary-fixed cursor-pointer">
                Time&amp;Date <span class="text-secondary">Tools</span>
            </a>
            <nav class="hidden md:flex items-center gap-stack-md h-full absolute left-1/2 -translate-x-1/2">
                <a class="h-full flex items-center {{ request()->routeIs('home') ? 'text-secondary dark:text-secondary-fixed border-b-2 border-secondary' : 'text-on-surface-variant dark:text-surface-variant hover:text-secondary dark:hover:text-secondary-fixed' }} pb-1 pt-1 font-h3 text-h3 cursor-pointer active:opacity-80" href="{{ route('home') }}">Calculators</a>
                
{{-- <a class="h-full flex items-center text-on-surface-variant dark:text-surface-variant hover:text-secondary dark:hover:text-secondary-fixed transition-colors font-h3 text-h3 cursor-pointer active:opacity-80" href="#">Converters</a>
                <a class="h-full flex items-center text-on-surface-variant dark:text-surface-variant hover:text-secondary dark:hover:text-secondary-fixed transition-colors font-h3 text-h3 cursor-pointer active:opacity-80" href="#">World Clock</a>
                <a class="h-full flex items-center text-on-surface-variant dark:text-surface-variant hover:text-secondary dark:hover:text-secondary-fixed transition-colors font-h3 text-h3 cursor-pointer active:opacity-80" href="#">Calendar</a>
                <a class="h-full flex items-center text-on-surface-variant dark:text-surface-variant hover:text-secondary dark:hover:text-secondary-fixed transition-colors font-h3 text-h3 cursor-pointer active:opacity-80" href="#">News</a>
                --}}
            </nav>
            <div class="hidden md:block">
            {{-- 
            <button class="bg-secondary text-on-secondary px-stack-md py-2 rounded font-h3 text-h3 hover:bg-secondary-container transition-colors">
                Sign In
            </button>
            --}}
            </div>
            <button class="md:hidden text-on-surface">
                <span class="material-symbols-outlined text-h1">menu</span>
            </button>
        </div>
    </header>
    <!-- Global Coming Soon Modal -->
    <div x-show="showComingSoon" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm"
         x-cloak>
        <div x-on:click.away="showComingSoon = false" class="bg-surface-container-lowest border border-outline-variant rounded-xl p-stack-lg max-w-sm w-full shadow-display text-center space-y-stack-sm">
            <div class="w-16 h-16 bg-secondary-container text-on-secondary-container rounded-full flex items-center justify-center mx-auto mb-stack-md">
                <span class="material-symbols-outlined text-[32px]">rocket_launch</span>
            </div>
            <h3 class="font-h2 text-h2 text-on-surface">Coming Soon!</h3>
            <p class="font-body-md text-body-md text-on-surface-variant text-center">We're working hard to bring this tool to life. Stay tuned for updates!</p>
            <button x-on:click="showComingSoon = false" class="w-full bg-secondary text-on-secondary py-3 rounded-lg font-h3 text-h3 hover:bg-secondary-container transition-colors mt-stack-md">
                Got it!
            </button>
        </div>
    </div>

    <main class="max-w-[1200px] mx-auto px-gutter py-section-gap space-y-section-gap">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="w-full mt-stack-lg bg-primary-container dark:bg-surface-container-lowest">
        <div class="max-w-[1200px] mx-auto px-gutter py-stack-lg flex flex-col md:flex-row justify-between items-center gap-base">
            <div class="flex flex-col items-center md:items-start gap-2">
                <div class="font-h3 text-h3 font-bold text-on-primary dark:text-primary">
                    Time&amp;Date Tools
                </div>
                <div class="font-body-md text-body-md text-on-primary-container dark:text-on-surface opacity-80">
                    © {{ date('Y') }} Time&amp;Date Tools. All rights reserved.
                </div>
            </div>
            <nav class="flex flex-wrap justify-center gap-x-stack-md gap-y-2 font-body-md text-body-md">
                <a class="text-on-primary-container opacity-80 hover:opacity-100 hover:underline transition-all cursor-pointer" href="{{ route('privacy') }}">Privacy Policy</a>
                <a class="text-on-primary-container opacity-80 hover:opacity-100 hover:underline transition-all cursor-pointer" href="{{ route('terms') }}">Terms of Service</a>
                <a class="text-on-primary-container opacity-80 hover:opacity-100 hover:underline transition-all cursor-pointer" href="{{ route('about') }}">About</a>
                <a class="text-on-primary-container opacity-80 hover:opacity-100 hover:underline transition-all cursor-pointer" href="{{ route('contact') }}">Contact Us</a>
            </nav>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>

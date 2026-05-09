<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    @stack('styles')
</head>
<body class="bg-background text-on-surface font-body-md text-body-md pt-16">
    <!-- TopAppBar -->
    <header class="fixed top-0 w-full z-50 bg-surface dark:bg-surface-dim border-b border-outline-variant dark:border-outline shadow-sm h-16">
        <div class="flex justify-between items-center max-w-[1200px] mx-auto px-gutter h-full relative">
            <a href="{{ route('home') }}" class="font-h2 text-h2 font-bold text-primary dark:text-on-primary-fixed cursor-pointer">
                Time&amp;Date <span class="text-secondary">Tools</span>
            </a>
            <nav class="hidden md:flex items-center gap-stack-md h-full absolute left-1/2 -translate-x-1/2">
                <a class="h-full flex items-center {{ request()->routeIs('home') ? 'text-secondary border-b-2 border-secondary' : 'text-on-surface-variant hover:text-secondary dark:hover:text-secondary-fixed' }} pb-1 pt-1 font-h3 text-h3 cursor-pointer active:opacity-80" href="{{ route('home') }}">Calculators</a>
                
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
                <a class="text-white opacity-80 hover:opacity-100 hover:underline transition-all cursor-pointer dark:text-on-surface" href="{{ route('privacy') }}">Privacy Policy</a>
                <a class="text-on-primary-container opacity-80 hover:opacity-100 hover:underline transition-all cursor-pointer dark:text-on-surface" href="{{ route('terms') }}">Terms of Service</a>
                <a class="text-on-primary-container opacity-80 hover:opacity-100 hover:underline transition-all cursor-pointer dark:text-on-surface" href="{{ route('about') }}">About</a>
                <a class="text-on-primary-container opacity-80 hover:opacity-100 hover:underline transition-all cursor-pointer dark:text-on-surface" href="{{ route('contact') }}">Contact Us</a>
            </nav>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>

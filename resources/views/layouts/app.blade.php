<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Time&Date Tools - Free Online Calculators & Tools')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet"/>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
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
        .flat-shadow {
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05), 0 2px 4px -2px rgb(0 0 0 / 0.05);
        }
    </style>
    @stack('styles')
</head>
<body class="bg-background text-on-surface font-body-md text-body-md pt-16">
    <!-- TopAppBar -->
    <header class="fixed top-0 w-full z-50 bg-surface dark:bg-surface-dim border-b border-outline-variant dark:border-outline shadow-sm h-16">
        <div class="flex justify-between items-center max-w-[1200px] mx-auto px-gutter h-full">
            <a href="{{ route('home') }}" class="font-h2 text-h2 font-bold text-primary dark:text-on-primary-fixed cursor-pointer">
                Time&amp;Date <span class="text-secondary">Tools</span>
            </a>
            <nav class="hidden md:flex items-center gap-stack-md h-full">
                <a class="h-full flex items-center {{ request()->routeIs('home') ? 'text-secondary dark:text-secondary-fixed border-b-2 border-secondary' : 'text-on-surface-variant dark:text-surface-variant hover:text-secondary dark:hover:text-secondary-fixed' }} pb-1 pt-1 font-h3 text-h3 cursor-pointer active:opacity-80" href="{{ route('home') }}">Calculators</a>
                <a class="h-full flex items-center text-on-surface-variant dark:text-surface-variant hover:text-secondary dark:hover:text-secondary-fixed transition-colors font-h3 text-h3 cursor-pointer active:opacity-80" href="#">Converters</a>
                <a class="h-full flex items-center text-on-surface-variant dark:text-surface-variant hover:text-secondary dark:hover:text-secondary-fixed transition-colors font-h3 text-h3 cursor-pointer active:opacity-80" href="#">World Clock</a>
                <a class="h-full flex items-center text-on-surface-variant dark:text-surface-variant hover:text-secondary dark:hover:text-secondary-fixed transition-colors font-h3 text-h3 cursor-pointer active:opacity-80" href="#">Calendar</a>
                <a class="h-full flex items-center text-on-surface-variant dark:text-surface-variant hover:text-secondary dark:hover:text-secondary-fixed transition-colors font-h3 text-h3 cursor-pointer active:opacity-80" href="#">News</a>
            </nav>
            <button class="hidden md:inline-flex bg-secondary text-on-secondary px-stack-md py-2 rounded font-h3 text-h3 hover:bg-secondary-container transition-colors">
                Sign In
            </button>
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
                <a class="text-on-primary-container opacity-80 hover:opacity-100 hover:underline transition-all cursor-pointer" href="#">Privacy Policy</a>
                <a class="text-on-primary-container opacity-80 hover:opacity-100 hover:underline transition-all cursor-pointer" href="#">Terms of Service</a>
                <a class="text-on-primary-container opacity-80 hover:opacity-100 hover:underline transition-all cursor-pointer" href="#">Cookie Settings</a>
                <a class="text-on-primary-container opacity-80 hover:opacity-100 hover:underline transition-all cursor-pointer" href="#">Contact Us</a>
                <a class="text-on-primary-container opacity-80 hover:opacity-100 hover:underline transition-all cursor-pointer" href="#">About</a>
                <a class="text-on-primary-container opacity-80 hover:opacity-100 hover:underline transition-all cursor-pointer" href="#">Sitemap</a>
            </nav>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>

@extends('layouts.app')

@section('title', 'Free Online Calculators - Age, Time & Date Tools')
@section('meta_description', 'Free online tools to calculate your exact age, time duration, and date differences. Fast, accurate, and 100% private calculations.')

@push('head')
<script type="application/ld+json">
{
  "{{ '@' }}context": "https://schema.org",
  "{{ '@' }}type": "WebSite",
  "name": "Time&Date Tools",
  "url": "{{ url('/') }}",
  "description": "Free online calculators for age, time, and date.",
  "potentialAction": {
    "{{ '@' }}type": "SearchAction",
    "target": "{{ url('/') }}/search?q={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="-mx-gutter -mt-section-gap pt-24 pb-20 md:pt-32 md:pb-28">
        <div class="max-w-[1200px] mx-auto px-gutter md:px-10 relative">
            <!-- Solid background matching site -->
            <div class="absolute inset-0 -mx-0 -my-0 bg-surface -z-10 rounded-3xl"></div>
            <style>
                @keyframes heroFloat {
                    0%, 100% { transform: translate(0, 0) scale(1); }
                    33% { transform: translate(20px, -20px) scale(1.02); }
                    66% { transform: translate(-20px, 20px) scale(0.98); }
                }
            </style>

            <div class="max-w-3xl">
                <div data-reveal="fade-up" data-reveal-duration="700">
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-secondary/10 text-secondary font-label-caps text-label-caps border border-secondary/20 shadow-xs mb-6">
                        <span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
                        Featured Tool
                    </span>
                </div>
                <h1 class="font-display text-display text-on-surface mb-6 leading-[1.05]" data-reveal="fade-up" data-reveal-delay="80" data-reveal-duration="700">
                    Precision Age Calculator<br>
                    <span class="text-secondary">& Life Story Tracker</span>
                </h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed max-w-2xl mb-8" data-reveal="fade-up" data-reveal-delay="160" data-reveal-duration="700">
                    Experience the most accurate chronological age calculation available. Our tool accounts for every leap year, month duration, and time shift to give you a perfect breakdown of your journey in years, months, and days.
                </p>
                <div class="flex flex-wrap items-center gap-4" data-reveal="fade-up" data-reveal-delay="240" data-reveal-duration="700">
                    <a href="{{ route('age-calculator') }}" class="group inline-flex items-center gap-3 bg-primary text-on-primary px-8 py-4 rounded-2xl font-h2 text-h2 hover:bg-primary/85 transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                        Calculate Your Exact Age
                        <span class="material-symbols-outlined transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
                    </a>
                    <div class="flex items-center gap-2.5 text-on-surface-variant font-body-md bg-white/70 backdrop-blur-md px-5 py-2.5 rounded-xl border border-outline-variant/30 shadow-xs">
                        <span class="material-symbols-outlined text-secondary">verified_user</span>
                        100% Client-Side & Private
                    </div>
                </div>
            </div>

            <!-- Floating decorative element -->
            <div class="hidden lg:block absolute right-[2.5rem] top-1/2 -translate-y-1/2 w-[340px] h-[340px]" data-reveal="scale-in" data-reveal-delay="400" data-reveal-duration="900">
                <div class="relative w-full h-full">
                    <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-secondary/10 to-primary-fixed/10 border border-outline-variant/20 shadow-card backdrop-blur-sm animate-[heroFloat_20s_ease-in-out_infinite]"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="material-symbols-outlined text-[180px] text-secondary/10 animate-[heroFloat_16s_ease-in-out_infinite_reverse]">schedule</span>
                    </div>
                    <!-- Orbiting dots -->
                    <div class="absolute inset-0 animate-[spin_20s_linear_infinite]">
                        <div class="absolute top-4 left-1/2 -translate-x-1/2 w-3 h-3 rounded-full bg-secondary/40"></div>
                    </div>
                    <div class="absolute inset-0 animate-[spin_15s_linear_infinite_reverse]">
                        <div class="absolute bottom-8 right-8 w-2 h-2 rounded-full bg-primary/30"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Bar -->
    <section class="-mx-gutter -mt-12 mb-8" data-reveal="fade-up" data-reveal-delay="100">
        <div class="max-w-[1200px] mx-auto px-gutter">
            <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant/40 shadow-xs px-8 py-5 flex flex-wrap items-center justify-center md:justify-between gap-4">
                <div class="flex items-center gap-6 text-sm text-on-surface-variant">
                    <span class="flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-secondary text-base">check_circle</span>
                        No signup required
                    </span>
                    <span class="flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-secondary text-base">check_circle</span>
                        Works offline
                    </span>
                    <span class="flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-secondary text-base">check_circle</span>
                        Unlimited calculations
                    </span>
                </div>
                <div class="flex items-center gap-1 text-sm text-on-surface-variant">
                    <span class="flex">
                        <span class="material-symbols-outlined text-amber-500 text-base">star</span>
                        <span class="material-symbols-outlined text-amber-500 text-base">star</span>
                        <span class="material-symbols-outlined text-amber-500 text-base">star</span>
                        <span class="material-symbols-outlined text-amber-500 text-base">star</span>
                        <span class="material-symbols-outlined text-amber-500 text-base">star</span>
                    </span>
                    <span class="font-medium text-on-surface ml-1">4.9</span>
                    <span class="text-on-surface-variant/60">from 2,000+ users</span>
                </div>
            </div>
        </div>
    </section>

    <!-- How it Works Section -->
    <section class="space-y-12">
        <div class="text-center space-y-4 max-w-2xl mx-auto" data-reveal="fade-up">
            <span class="inline-block text-secondary font-label-caps text-label-caps tracking-widest uppercase">Methodology</span>
            <h2 class="font-h1 text-h1 text-on-surface">The Science of Time</h2>
            <p class="text-on-surface-variant font-body-md">Our algorithm doesn't just subtract years; it traverses the complex landscape of the Gregorian calendar to ensure legal-grade accuracy.</p>
            <div class="h-1 w-16 bg-gradient-to-r from-secondary to-primary-fixed mx-auto rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="group relative bg-surface-container-lowest p-8 rounded-2xl border border-outline-variant/40 shadow-xs hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500" data-reveal="fade-up" data-reveal-delay="0">
                <div class="absolute top-0 left-6 right-6 h-px bg-gradient-to-r from-transparent via-secondary/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="w-14 h-14 bg-secondary/10 rounded-2xl flex items-center justify-center text-secondary mb-6 group-hover:bg-secondary group-hover:text-white transition-all duration-300">
                    <span class="material-symbols-outlined text-2xl">calendar_today</span>
                </div>
                <h3 class="font-h2 text-h2 text-on-surface mb-4">Leap Year Logic</h3>
                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                    Our algorithm traverses each year individually, ensuring that if you were born on February 29th, your age is calculated with astronomical precision, respecting both tropical and calendar year rules.
                </p>
            </div>
            <div class="group relative bg-surface-container-lowest p-8 rounded-2xl border border-outline-variant/40 shadow-xs hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500" data-reveal="fade-up" data-reveal-delay="100">
                <div class="absolute top-0 left-6 right-6 h-px bg-gradient-to-r from-transparent via-secondary/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="w-14 h-14 bg-secondary/10 rounded-2xl flex items-center justify-center text-secondary mb-6 group-hover:bg-secondary group-hover:text-white transition-all duration-300">
                    <span class="material-symbols-outlined text-2xl">update</span>
                </div>
                <h3 class="font-h2 text-h2 text-on-surface mb-4">Month Normalization</h3>
                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                    We calculate the difference by looking at the specific number of days in each month you have lived through, providing a result that holds up under professional and legal scrutiny.
                </p>
            </div>
            <div class="group relative bg-surface-container-lowest p-8 rounded-2xl border border-outline-variant/40 shadow-xs hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500" data-reveal="fade-up" data-reveal-delay="200">
                <div class="absolute top-0 left-6 right-6 h-px bg-gradient-to-r from-transparent via-secondary/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="w-14 h-14 bg-secondary/10 rounded-2xl flex items-center justify-center text-secondary mb-6 group-hover:bg-secondary group-hover:text-white transition-all duration-300">
                    <span class="material-symbols-outlined text-2xl">lock</span>
                </div>
                <h3 class="font-h2 text-h2 text-on-surface mb-4">Zero-Latency Privacy</h3>
                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                    The entire calculation happens in your browser using JavaScript. Your data never leaves your device, delivering results at the speed of your local processor with absolute privacy.
                </p>
            </div>
        </div>
    </section>

    <!-- Tool Features Section -->
    <section class="relative overflow-hidden rounded-3xl bg-surface-container-low border border-outline-variant/30 p-8 md:p-14">
        <div class="flex flex-col lg:flex-row gap-14 items-center">
            <div class="lg:w-1/2 space-y-7">
                <div data-reveal="fade-up">
                    <span class="inline-block text-secondary font-label-caps text-label-caps tracking-widest uppercase mb-3">Features</span>
                    <h2 class="font-h1 text-h1 text-on-surface">More Than Just a Calculator</h2>
                </div>
                <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed" data-reveal="fade-up" data-reveal-delay="80">
                    Our platform goes beyond simple math to provide a rich, narrative-driven exploration of your life. Discover how your personal timeline intersects with the broader history of technology, culture, and the cosmos.
                </p>
                <div class="space-y-4" data-reveal="fade-up" data-reveal-delay="160">
                    <div class="group flex gap-5 p-5 bg-white rounded-2xl shadow-xs border border-outline-variant/20 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
                        <span class="material-symbols-outlined text-secondary text-3xl shrink-0 group-hover:scale-110 transition-transform duration-300">auto_awesome</span>
                        <div>
                            <h3 class="font-h3 text-on-surface mb-1">Era Mapping</h3>
                            <p class="font-body-md text-on-surface-variant">See which generation you belong to and the cultural zeitgeist of your birth year.</p>
                        </div>
                    </div>
                    <div class="group flex gap-5 p-5 bg-white rounded-2xl shadow-xs border border-outline-variant/20 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
                        <span class="material-symbols-outlined text-secondary text-3xl shrink-0 group-hover:scale-110 transition-transform duration-300">timeline</span>
                        <div>
                            <h3 class="font-h3 text-on-surface mb-1">Life Milestones</h3>
                            <p class="font-body-md text-on-surface-variant">Discover the exact day you will reach 1 billion seconds or 10,000 days of life.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/2 grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="group bg-white border border-outline-variant/30 rounded-2xl p-7 hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500 cursor-default" data-reveal="scale-in" data-reveal-delay="0">
                    <span class="material-symbols-outlined text-5xl text-secondary/80 mb-5 block group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">rocket_launch</span>
                    <h4 class="font-h3 text-on-surface mb-2">Tech Origins</h4>
                    <p class="text-sm text-on-surface-variant leading-relaxed">Find out what major technological breakthrough happened on the day you were born.</p>
                </div>
                <div class="group bg-white border border-outline-variant/30 rounded-2xl p-7 hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500 cursor-default" data-reveal="scale-in" data-reveal-delay="100">
                    <span class="material-symbols-outlined text-5xl text-secondary/80 mb-5 block group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">movie</span>
                    <h4 class="font-h3 text-on-surface mb-2">Pop Culture Trivia</h4>
                    <p class="text-sm text-on-surface-variant leading-relaxed">The #1 song and movie from your birth week, instantly retrieved for your nostalgia.</p>
                </div>
                <div class="group bg-white border border-outline-variant/30 rounded-2xl p-7 hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500 cursor-default" data-reveal="scale-in" data-reveal-delay="200">
                    <span class="material-symbols-outlined text-5xl text-secondary/80 mb-5 block group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">globe</span>
                    <h4 class="font-h3 text-on-surface mb-2">Historical Context</h4>
                    <p class="text-sm text-on-surface-variant leading-relaxed">Major world events that shaped the year you entered the world.</p>
                </div>
                <div class="group bg-white border border-outline-variant/30 rounded-2xl p-7 hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500 cursor-default" data-reveal="scale-in" data-reveal-delay="300">
                    <span class="material-symbols-outlined text-5xl text-secondary/80 mb-5 block group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">psychology</span>
                    <h4 class="font-h3 text-on-surface mb-2">Life Perspective</h4>
                    <p class="text-sm text-on-surface-variant leading-relaxed">Visualize your life battery, weeks remaining, and cosmic journey distance.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Philosophy Section -->
    <section class="max-w-4xl mx-auto space-y-12">
        <div data-reveal="fade-up">
            <h2 class="font-h1 text-h1 text-on-surface mb-8">The Philosophy of Chronological Age</h2>
            <div class="space-y-6 font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                <p>
                    Chronological age is the most common way we measure our time on Earth, but it is far from the only way. While your birth date calculator gives you a specific number of years, months, and days, the experience of aging is a complex blend of biological, psychological, and social factors.
                </p>
                <p>
                    At Time&Date Tools, we believe in the "4,000 Weeks" philosophy. The average human lifespan is roughly 4,000 weeks. When you visualize your life not as a large, abstract number of years, but as a finite series of weekends, every moment takes on a new weight.
                </p>
            </div>
        </div>
        <blockquote class="relative border-l-[6px] border-secondary pl-8 py-8 pr-6 bg-gradient-to-r from-surface-container-low to-transparent rounded-r-2xl" data-reveal="fade-up">
            <span class="absolute top-4 left-4 text-6xl text-secondary/10 font-serif leading-none">"</span>
            <p class="relative text-xl italic text-on-surface leading-relaxed max-w-2xl">
                Time is what we want most, but what we use worst. The key is in not spending time, but in investing it into the people and experiences that matter.
            </p>
            <footer class="mt-4 text-sm font-semibold text-secondary">— William Penn</footer>
        </blockquote>
        <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed" data-reveal="fade-up">
            By tracking your age down to the minutes and even heartbeats, we aim to provide more than just data — we aim to provide perspective. Whether you are using this information for a milestone celebration or as a tool for personal reflection, understanding the precise math of your existence is a powerful way to reclaim your time.
        </p>
    </section>

    <!-- FAQ Section -->
    <section class="bg-surface-container-lowest border border-outline-variant/50 rounded-3xl p-8 md:p-14 shadow-xs" data-reveal="fade-up">
        <div class="max-w-3xl mx-auto space-y-10">
            <div class="text-center space-y-3">
                <span class="inline-block text-secondary font-label-caps text-label-caps tracking-widest uppercase">Support</span>
                <h2 class="font-h1 text-h1 text-on-surface">Frequently Asked Questions</h2>
                <p class="font-body-md text-on-surface-variant">Everything you need to know about our time and date tools.</p>
            </div>

            <div class="space-y-3" x-data="{ active: null }">
                @foreach([
                    ['id' => 1, 'q' => 'How accurate is the Exact Age Calculator?', 'a' => 'Our calculator is designed for 100% mathematical accuracy. It accounts for leap years, the exact number of days in each specific month you have lived through, and even handles historical calendar discrepancies. It is as accurate as the Gregorian calendar allows.'],
                    ['id' => 2, 'q' => 'Is my date of birth stored on your servers?', 'a' => 'No. We prioritize your privacy above all else. All calculations are performed client-side using JavaScript in your own browser. We do not use databases to store your inputs, and your birth date never leaves your device.'],
                    ['id' => 3, 'q' => 'What does "Life Story" mode show?', 'a' => 'Life Story mode provides a deep dive into your time on Earth. It shows you total days, weeks, and hours lived, estimated heartbeats and breaths, your birth year\'s hit movies and songs, and fascinating historical trivia from the day you were born.'],
                    ['id' => 4, 'q' => 'Can I use this for legal or official age verification?', 'a' => 'Yes. Because we use a precise day-by-day calculation method that respects the Western legal definition of age (increasing on your birthday), this tool is suitable for checking statutory age limits for jobs, insurance, and legal documents.'],
                ] as $faq)
                <div class="group bg-white rounded-2xl border border-outline-variant/40 shadow-xs overflow-hidden hover:shadow-md transition-shadow duration-300" data-reveal="fade-up" data-reveal-delay="{{ $loop->index * 80 }}">
                    <button @click="active = active === {{ $faq['id'] }} ? null : {{ $faq['id'] }}" class="w-full flex justify-between items-center p-6 text-left hover:bg-surface-container-low/50 transition-colors">
                        <span class="font-h3 text-on-surface pr-4">{{ $faq['q'] }}</span>
                        <span class="material-symbols-outlined text-secondary shrink-0 transition-transform duration-300" :class="active === {{ $faq['id'] }} ? 'rotate-180' : ''">expand_more</span>
                    </button>
                    <div x-show="active === {{ $faq['id'] }}" x-collapse class="border-t border-outline-variant/30">
                        <div class="p-6 text-on-surface-variant leading-relaxed">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Popular Tools Section -->
    <section class="space-y-8 pb-4">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end border-b border-outline-variant/60 pb-6 gap-4" data-reveal="fade-up">
            <div>
                <span class="inline-block text-secondary font-label-caps text-label-caps tracking-widest uppercase mb-2">Explore</span>
                <h2 class="font-h1 text-h1 text-on-surface">Platform Modules</h2>
                <p class="font-body-md text-on-surface-variant mt-1">Explore the core features of our precision time engine.</p>
            </div>
            <a href="{{ route('age-calculator') }}" class="group inline-flex items-center gap-2 text-secondary font-h3 hover:gap-3 transition-all duration-300">
                View All Tools <span class="material-symbols-outlined transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <a class="group bg-surface-container-lowest border border-outline-variant/40 rounded-2xl p-7 hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500 flex flex-col h-full cursor-pointer" href="{{ route('age-calculator') }}" data-reveal="fade-up" data-reveal-delay="0">
                <div class="mb-5 w-14 h-14 bg-primary-fixed rounded-2xl flex items-center justify-center text-on-primary-fixed group-hover:bg-secondary group-hover:text-white transition-all duration-300">
                    <span class="material-symbols-outlined text-2xl">cake</span>
                </div>
                <h3 class="font-h2 text-h2 text-on-surface mb-2">Age Calculator</h3>
                <p class="font-body-md text-on-surface-variant mb-6 flex-grow">The core engine for calculating exact age in years, months, and days with legal-grade precision.</p>
                <div class="flex items-center gap-2 text-secondary font-h3 text-sm">
                    Launch Tool <span class="material-symbols-outlined text-[18px] transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
                </div>
            </a>

            <div class="group bg-surface-container-lowest border border-outline-variant/40 rounded-2xl p-7 hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500 flex flex-col h-full cursor-default" data-reveal="fade-up" data-reveal-delay="80">
                <div class="mb-5 w-14 h-14 bg-secondary/10 rounded-2xl flex items-center justify-center text-secondary">
                    <span class="material-symbols-outlined text-2xl">auto_awesome</span>
                </div>
                <h3 class="font-h2 text-h2 text-on-surface mb-2">Era Mapping</h3>
                <p class="font-body-md text-on-surface-variant mb-6 flex-grow">Discover your generation's identity and the cultural zeitgeist that shaped your birth year.</p>
                <span class="inline-flex items-center gap-2 text-xs font-label-caps text-secondary bg-secondary/5 px-3 py-1.5 rounded-full w-fit">Included in Age Calc</span>
            </div>

            <div class="group bg-surface-container-lowest border border-outline-variant/40 rounded-2xl p-7 hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500 flex flex-col h-full cursor-default" data-reveal="fade-up" data-reveal-delay="160">
                <div class="mb-5 w-14 h-14 bg-secondary/10 rounded-2xl flex items-center justify-center text-secondary">
                    <span class="material-symbols-outlined text-2xl">timeline</span>
                </div>
                <h3 class="font-h2 text-h2 text-on-surface mb-2">Life Milestones</h3>
                <p class="font-body-md text-on-surface-variant mb-6 flex-grow">Track your journey to 1 billion seconds, 10,000 days, and other significant chronological events.</p>
                <span class="inline-flex items-center gap-2 text-xs font-label-caps text-secondary bg-secondary/5 px-3 py-1.5 rounded-full w-fit">Included in Age Calc</span>
            </div>

            <div class="group bg-surface-container-lowest border border-outline-variant/40 rounded-2xl p-7 hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500 flex flex-col h-full cursor-default" data-reveal="fade-up" data-reveal-delay="240">
                <div class="mb-5 w-14 h-14 bg-secondary/10 rounded-2xl flex items-center justify-center text-secondary">
                    <span class="material-symbols-outlined text-2xl">rocket_launch</span>
                </div>
                <h3 class="font-h2 text-h2 text-on-surface mb-2">History & Trivia</h3>
                <p class="font-body-md text-on-surface-variant mb-6 flex-grow">Instantly retrieve #1 songs, movies, and major tech breakthroughs from the day you were born.</p>
                <span class="inline-flex items-center gap-2 text-xs font-label-caps text-secondary bg-secondary/5 px-3 py-1.5 rounded-full w-fit">Included in Age Calc</span>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-primary-container/20 via-background to-secondary-fixed/15 border border-outline-variant/20 p-8 md:p-14" data-reveal="fade-up">
        <div class="text-center mb-12">
            <span class="inline-block text-secondary font-label-caps text-label-caps tracking-widest uppercase mb-3">Testimonials</span>
            <h2 class="font-h1 text-h1 text-on-surface">Loved by Thousands</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-7 border border-outline-variant/30 shadow-xs hover:shadow-md transition-all duration-300" data-reveal="fade-up" data-reveal-delay="0">
                <div class="flex items-center gap-1 mb-4">
                    @for($i=0;$i<5;$i++)<span class="material-symbols-outlined text-amber-500 text-sm">star</span>@endfor
                </div>
                <p class="text-on-surface-variant leading-relaxed mb-5">"The most accurate age calculator I've ever used. The life story feature gave me a whole new perspective on my time here. Beautifully designed too."</p>
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-secondary/10 flex items-center justify-center text-secondary font-bold text-sm">SM</div>
                    <div>
                        <div class="font-semibold text-on-surface text-sm">Sarah Mitchell</div>
                        <div class="text-xs text-on-surface-variant">Product Designer</div>
                    </div>
                </div>
            </div>
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-7 border border-outline-variant/30 shadow-xs hover:shadow-md transition-all duration-300" data-reveal="fade-up" data-reveal-delay="100">
                <div class="flex items-center gap-1 mb-4">
                    @for($i=0;$i<5;$i++)<span class="material-symbols-outlined text-amber-500 text-sm">star</span>@endfor
                </div>
                <p class="text-on-surface-variant leading-relaxed mb-5">"I use this for legal document verification at my firm. The precision is impeccable, and knowing it's all client-side gives me and my clients peace of mind."</p>
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-secondary/10 flex items-center justify-center text-secondary font-bold text-sm">JD</div>
                    <div>
                        <div class="font-semibold text-on-surface text-sm">James Davidson</div>
                        <div class="text-xs text-on-surface-variant">Attorney</div>
                    </div>
                </div>
            </div>
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-7 border border-outline-variant/30 shadow-xs hover:shadow-md transition-all duration-300" data-reveal="fade-up" data-reveal-delay="200">
                <div class="flex items-center gap-1 mb-4">
                    @for($i=0;$i<5;$i++)<span class="material-symbols-outlined text-amber-500 text-sm">star</span>@endfor
                </div>
                <p class="text-on-surface-variant leading-relaxed mb-5">"The age difference calculator helped me settle a friendly debate about who was older in our friend group. The fun facts are an awesome bonus!"</p>
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-secondary/10 flex items-center justify-center text-secondary font-bold text-sm">AK</div>
                    <div>
                        <div class="font-semibold text-on-surface text-sm">Aisha Khan</div>
                        <div class="text-xs text-on-surface-variant">Teacher</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Banner -->
    <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-primary via-primary-container to-secondary-container p-8 md:p-14 text-center" data-reveal="scale-in">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 rounded-full bg-white/20 blur-[80px]"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 rounded-full bg-secondary/20 blur-[60px]"></div>
        </div>
        <div class="relative max-w-2xl mx-auto space-y-6">
            <h2 class="font-h1 text-h1 text-white">Ready to Discover Your Story?</h2>
            <p class="text-white/80 font-body-lg text-body-lg leading-relaxed">
                Join thousands of users who have already explored their chronological footprint. Get precise calculations, fun facts, and a fresh perspective on your time.
            </p>
            <div class="flex flex-wrap justify-center gap-4 pt-2">
                <a href="{{ route('age-calculator') }}" class="inline-flex items-center gap-2 bg-white text-primary px-8 py-4 rounded-2xl font-h2 text-h2 hover:bg-white/90 transition-all duration-300 shadow-xl hover:shadow-2xl hover:-translate-y-0.5">
                    <span class="material-symbols-outlined">calculate</span>
                    Calculate Now — It's Free
                </a>
            </div>
            <p class="text-white/50 text-sm">No signup. No data collection. Instant results.</p>
        </div>
    </section>

    <!-- Schema.org FAQ -->
    <script type="application/ld+json">
    {
      "{{ '@' }}context": "https://schema.org",
      "{{ '@' }}type": "FAQPage",
      "mainEntity": [
        {
          "{{ '@' }}type": "Question",
          "name": "How accurate is the Exact Age Calculator?",
          "acceptedAnswer": {
            "{{ '@' }}type": "Answer",
            "text": "Our calculator is designed for 100% mathematical accuracy. It accounts for leap years, the exact number of days in each specific month you have lived through, and even handles historical calendar discrepancies."
          }
        },
        {
          "{{ '@' }}type": "Question",
          "name": "Is my date of birth stored on your servers?",
          "acceptedAnswer": {
            "{{ '@' }}type": "Answer",
            "text": "No. All calculations are performed 'client-side' using JavaScript in your own browser. We do not use databases to store your inputs, and your birth date never leaves your device."
          }
        },
        {
          "{{ '@' }}type": "Question",
          "name": "What does 'Life Story' mode show?",
          "acceptedAnswer": {
            "{{ '@' }}type": "Answer",
            "text": "Life Story mode provides a deep dive into your time on Earth, including total days, weeks lived, estimated heartbeats, and birth year trivia."
          }
        },
        {
          "{{ '@' }}type": "Question",
          "name": "Can I use this for legal or official age verification?",
          "acceptedAnswer": {
            "{{ '@' }}type": "Answer",
            "text": "Yes. Because we use a precise day-by-day calculation method that respects the Western legal definition of age, it is suitable for checking statutory age limits."
          }
        }
      ]
    }
    </script>
@endsection

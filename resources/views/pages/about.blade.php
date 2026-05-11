@extends('layouts.app')

@section('title', 'About Us - Time&Date Tools')

@section('content')
    <!-- Hero Banner -->
    <section class="-mx-gutter -mt-section-gap pt-24 pb-12 md:pt-32 md:pb-16 bg-gradient-to-br from-primary-container/30 via-background to-secondary-fixed/20 relative overflow-hidden">
        <div class="absolute inset-0 -z-10">
            <div class="absolute top-0 left-1/4 w-[500px] h-[500px] rounded-full bg-secondary/[0.06] blur-[100px]"></div>
            <div class="absolute bottom-0 right-1/4 w-[400px] h-[400px] rounded-full bg-primary-fixed/[0.07] blur-[80px]"></div>
        </div>
        <div class="max-w-[1200px] mx-auto px-gutter text-center" data-reveal="fade-up">
            <span class="inline-block text-secondary font-label-caps text-label-caps tracking-widest uppercase mb-3">Our Story</span>
            <h1 class="font-display text-display text-on-surface mb-4">About Time&Date Tools</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">Your premier destination for precise, reliable, and free chronological utilities built with modern web standards.</p>
        </div>
    </section>

    <div class="max-w-[1000px] mx-auto -mt-8 space-y-section-gap">
        <!-- Mission -->
        <div class="bg-surface-container-lowest rounded-3xl shadow-card border border-outline-variant/40 p-8 md:p-14 text-center" data-reveal="fade-up">
            <div class="w-16 h-16 bg-gradient-to-br from-secondary to-secondary-container rounded-2xl flex items-center justify-center text-white mx-auto mb-6 shadow-md">
                <span class="material-symbols-outlined text-3xl">rocket_launch</span>
            </div>
            <h2 class="font-h1 text-h1 text-on-surface mb-5">Our Mission</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed max-w-3xl mx-auto">
                Our mission is simple: to provide high-quality web-based tools that help you manage time and dates with absolute precision. We believe that professional-grade tools should be accessible to everyone, free of charge, and without the need for complex software installations. Every calculation is performed locally in your browser, ensuring your privacy is never compromised.
            </p>
        </div>

        <!-- Values Grid -->
        <div>
            <div class="text-center mb-10" data-reveal="fade-up">
                <span class="inline-block text-secondary font-label-caps text-label-caps tracking-widest uppercase mb-3">Why Us</span>
                <h2 class="font-h1 text-h1 text-on-surface">Our Values</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="group bg-surface-container-lowest rounded-2xl border border-outline-variant/40 p-8 shadow-xs hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500" data-reveal="fade-up" data-reveal-delay="0">
                    <div class="w-14 h-14 bg-secondary/10 rounded-2xl flex items-center justify-center text-secondary mb-5 group-hover:bg-secondary group-hover:text-white transition-all duration-300">
                        <span class="material-symbols-outlined text-2xl">verified</span>
                    </div>
                    <h3 class="font-h2 text-h2 text-on-surface mb-2">Accuracy First</h3>
                    <p class="text-on-surface-variant leading-relaxed">Our algorithms are rigorously tested to ensure they provide mathematically correct results, accounting for leap years and varying month lengths.</p>
                </div>
                <div class="group bg-surface-container-lowest rounded-2xl border border-outline-variant/40 p-8 shadow-xs hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500" data-reveal="fade-up" data-reveal-delay="80">
                    <div class="w-14 h-14 bg-secondary/10 rounded-2xl flex items-center justify-center text-secondary mb-5 group-hover:bg-secondary group-hover:text-white transition-all duration-300">
                        <span class="material-symbols-outlined text-2xl">lock</span>
                    </div>
                    <h3 class="font-h2 text-h2 text-on-surface mb-2">Privacy Focused</h3>
                    <p class="text-on-surface-variant leading-relaxed">All calculations are performed in your browser. We don't store your personal birth dates or specific calculation data on any server.</p>
                </div>
                <div class="group bg-surface-container-lowest rounded-2xl border border-outline-variant/40 p-8 shadow-xs hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500" data-reveal="fade-up" data-reveal-delay="160">
                    <div class="w-14 h-14 bg-secondary/10 rounded-2xl flex items-center justify-center text-secondary mb-5 group-hover:bg-secondary group-hover:text-white transition-all duration-300">
                        <span class="material-symbols-outlined text-2xl">speed</span>
                    </div>
                    <h3 class="font-h2 text-h2 text-on-surface mb-2">Blazing Fast</h3>
                    <p class="text-on-surface-variant leading-relaxed">Built with modern, lightweight technology. No bloated frameworks or slow loading times — just instant, reliable results every time.</p>
                </div>
                <div class="group bg-surface-container-lowest rounded-2xl border border-outline-variant/40 p-8 shadow-xs hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500" data-reveal="fade-up" data-reveal-delay="240">
                    <div class="w-14 h-14 bg-secondary/10 rounded-2xl flex items-center justify-center text-secondary mb-5 group-hover:bg-secondary group-hover:text-white transition-all duration-300">
                        <span class="material-symbols-outlined text-2xl">accessibility</span>
                    </div>
                    <h3 class="font-h2 text-h2 text-on-surface mb-2">Always Accessible</h3>
                    <p class="text-on-surface-variant leading-relaxed">Our tools work on any device with a web browser. No downloads, no accounts, no barriers — free for everyone, forever.</p>
                </div>
            </div>
        </div>

        <!-- Story / Timeline -->
        <div>
            <div class="text-center mb-10" data-reveal="fade-up">
                <span class="inline-block text-secondary font-label-caps text-label-caps tracking-widest uppercase mb-3">Timeline</span>
                <h2 class="font-h1 text-h1 text-on-surface">Our Journey</h2>
            </div>
            <div class="relative max-w-2xl mx-auto">
                <div class="absolute left-6 top-0 bottom-0 w-0.5 bg-gradient-to-b from-secondary via-secondary/40 to-transparent"></div>

                <div class="relative pl-16 pb-10" data-reveal="fade-up" data-reveal-delay="0">
                    <div class="absolute left-3 top-1 w-7 h-7 rounded-full bg-secondary border-4 border-white shadow-md"></div>
                    <div class="text-label-caps text-secondary font-semibold tracking-wider text-xs mb-1">2023</div>
                    <h3 class="font-h3 text-on-surface mb-1">The Beginning</h3>
                    <p class="text-on-surface-variant text-sm leading-relaxed">Time&Date Tools started as a small project to solve everyday calculation needs. The first version of the Age Calculator was built over a weekend.</p>
                </div>

                <div class="relative pl-16 pb-10" data-reveal="fade-up" data-reveal-delay="100">
                    <div class="absolute left-3 top-1 w-7 h-7 rounded-full bg-secondary border-4 border-white shadow-md"></div>
                    <div class="text-label-caps text-secondary font-semibold tracking-wider text-xs mb-1">2024</div>
                    <h3 class="font-h3 text-on-surface mb-1">Growing Community</h3>
                    <p class="text-on-surface-variant text-sm leading-relaxed">The platform grew into a comprehensive suite of tools used by thousands of people globally — from students and parents to project managers and researchers.</p>
                </div>

                <div class="relative pl-16" data-reveal="fade-up" data-reveal-delay="200">
                    <div class="absolute left-3 top-1 w-7 h-7 rounded-full bg-secondary border-4 border-white shadow-md"></div>
                    <div class="text-label-caps text-secondary font-semibold tracking-wider text-xs mb-1">Today</div>
                    <h3 class="font-h3 text-on-surface mb-1">Continuous Improvement</h3>
                    <p class="text-on-surface-variant text-sm leading-relaxed">We are constantly refining our algorithms, adding new features like Life Story mode, and expanding our toolset based on community feedback.</p>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="text-center bg-gradient-to-r from-secondary/5 to-primary-fixed/10 rounded-3xl border border-secondary/10 p-10" data-reveal="scale-in">
            <h2 class="font-h1 text-h1 text-on-surface mb-4">Built with Care</h2>
            <p class="text-on-surface-variant max-w-xl mx-auto mb-8">
                Every line of code, every pixel, and every algorithm was crafted with attention to detail. We hope our tools bring you the precision and perspective you deserve.
            </p>
            <a href="{{ route('age-calculator') }}" class="inline-flex items-center gap-2 bg-secondary text-on-secondary px-8 py-4 rounded-2xl font-h2 text-h2 hover:bg-secondary-container transition-all duration-300 shadow-md hover:shadow-glow hover:-translate-y-0.5">
                <span class="material-symbols-outlined">calculate</span>
                Try the Calculator
            </a>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Terms of Service - Time&Date Tools')

@section('content')
    <!-- Hero Banner -->
    <section class="-mx-gutter -mt-section-gap pt-24 pb-10 md:pt-28 md:pb-12 bg-gradient-to-br from-primary-container/20 via-background to-secondary-fixed/15 relative overflow-hidden">
        <div class="max-w-[1200px] mx-auto px-gutter" data-reveal="fade-up">
            <span class="inline-block text-secondary font-label-caps text-label-caps tracking-widest uppercase mb-3">Legal</span>
            <h1 class="font-display text-display text-on-surface mb-3">Terms of Service</h1>
            <p class="text-on-surface-variant font-body-md">Last Updated: {{ date('F d, Y') }}</p>
        </div>
    </section>

    <div class="max-w-[1000px] mx-auto -mt-4">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-gutter">
            <!-- Sticky TOC -->
            <div class="hidden lg:block lg:col-span-1">
                <div class="sticky top-24 bg-surface-container-lowest rounded-2xl shadow-xs border border-outline-variant/40 p-6" data-reveal="fade-up">
                    <h4 class="font-h3 text-on-surface mb-4 text-sm">Contents</h4>
                    <nav class="space-y-2">
                        <a href="#terms" class="block text-sm text-on-surface-variant hover:text-secondary transition-colors">1. Terms</a>
                        <a href="#license" class="block text-sm text-on-surface-variant hover:text-secondary transition-colors">2. Use License</a>
                        <a href="#disclaimer" class="block text-sm text-on-surface-variant hover:text-secondary transition-colors">3. Disclaimer</a>
                        <a href="#limitations" class="block text-sm text-on-surface-variant hover:text-secondary transition-colors">4. Limitations</a>
                        <a href="#accuracy" class="block text-sm text-on-surface-variant hover:text-secondary transition-colors">5. Accuracy</a>
                    </nav>
                </div>
            </div>

            <!-- Content -->
            <div class="lg:col-span-3 bg-surface-container-lowest rounded-3xl shadow-card border border-outline-variant/40 p-8 md:p-12 space-y-10" data-reveal="fade-up" data-reveal-delay="100">
                <section id="terms" class="scroll-mt-24">
                    <span class="text-label-caps text-secondary font-semibold tracking-wider text-xs uppercase">Section 1</span>
                    <h2 class="font-h2 text-h2 text-on-surface mt-2 mb-4">Terms</h2>
                    <p class="text-on-surface-variant font-body-md leading-relaxed">By accessing the website at <a href="{{ url('/') }}" class="text-secondary hover:underline font-medium">{{ url('/') }}</a>, you are agreeing to be bound by these terms of service, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws.</p>
                </section>

                <section id="license" class="scroll-mt-24 pt-8 border-t border-outline-variant/30">
                    <span class="text-label-caps text-secondary font-semibold tracking-wider text-xs uppercase">Section 2</span>
                    <h2 class="font-h2 text-h2 text-on-surface mt-2 mb-4">Use License</h2>
                    <p class="text-on-surface-variant font-body-md leading-relaxed">Permission is granted to temporarily use the tools and calculators on Time&Date Tools' website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title.</p>
                </section>

                <section id="disclaimer" class="scroll-mt-24 pt-8 border-t border-outline-variant/30">
                    <span class="text-label-caps text-secondary font-semibold tracking-wider text-xs uppercase">Section 3</span>
                    <h2 class="font-h2 text-h2 text-on-surface mt-2 mb-4">Disclaimer</h2>
                    <p class="text-on-surface-variant font-body-md leading-relaxed mb-4">The materials on Time&Date Tools' website are provided on an 'as is' basis. Time&Date Tools makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</p>
                    <p class="text-on-surface-variant font-body-md leading-relaxed">Further, Time&Date Tools does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its website or otherwise relating to such materials or on any sites linked to this site.</p>
                </section>

                <section id="limitations" class="scroll-mt-24 pt-8 border-t border-outline-variant/30">
                    <span class="text-label-caps text-secondary font-semibold tracking-wider text-xs uppercase">Section 4</span>
                    <h2 class="font-h2 text-h2 text-on-surface mt-2 mb-4">Limitations</h2>
                    <p class="text-on-surface-variant font-body-md leading-relaxed">In no event shall Time&Date Tools or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on Time&Date Tools' website.</p>
                </section>

                <section id="accuracy" class="scroll-mt-24 pt-8 border-t border-outline-variant/30">
                    <span class="text-label-caps text-secondary font-semibold tracking-wider text-xs uppercase">Section 5</span>
                    <h2 class="font-h2 text-h2 text-on-surface mt-2 mb-4">Accuracy of Materials</h2>
                    <p class="text-on-surface-variant font-body-md leading-relaxed">The materials appearing on Time&Date Tools' website could include technical, typographical, or photographic errors. Time&Date Tools does not warrant that any of the materials on its website are accurate, complete or current.</p>
                </section>
            </div>
        </div>
    </div>
@endsection

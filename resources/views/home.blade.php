@extends('layouts.app')

@section('title', 'Free Age Calculator & Time Tools – Exact Results by Date of Birth')
@section('meta_description', 'Free age calculator to find your exact age by date of birth in years, months, days and seconds. Plus time calculator, hours calculator, and date tools. Instant, private, 100% free.')

@push('head')
<script type="application/ld+json">
{
  "{{ '@' }}context": "https://schema.org",
  "{{ '@' }}type": "FAQPage",
  "mainEntity": [
    {
      "{{ '@' }}type": "Question",
      "name": "How do I calculate my exact age by date of birth?",
      "acceptedAnswer": {
        "{{ '@' }}type": "Answer",
        "text": "Enter your date of birth in our age calculator and it instantly shows your exact age in years, months, days, hours, minutes, and seconds. The tool accounts for leap years and the exact number of days in each month."
      }
    },
    {
      "{{ '@' }}type": "Question",
      "name": "What is the difference between an age calculator and a date of birth calculator?",
      "acceptedAnswer": {
        "{{ '@' }}type": "Answer",
        "text": "They are the same thing. A date of birth calculator takes your birth date, compares it to today, and returns your exact age in years, months, and days."
      }
    },
    {
      "{{ '@' }}type": "Question",
      "name": "How does the age difference calculator work?",
      "acceptedAnswer": {
        "{{ '@' }}type": "Answer",
        "text": "Switch to Age Difference mode on the calculator page. Enter two birth dates and the tool returns the exact gap in years, months, and days. It works as an age gap calculator for any two dates."
      }
    },
    {
      "{{ '@' }}type": "Question",
      "name": "Is my date of birth stored on your servers?",
      "acceptedAnswer": {
        "{{ '@' }}type": "Answer",
        "text": "No. Every calculation runs locally in your browser. Your birth date never leaves your device and is never stored anywhere on our servers."
      }
    },
    {
      "{{ '@' }}type": "Question",
      "name": "Can I use this for legal or official age verification?",
      "acceptedAnswer": {
        "{{ '@' }}type": "Answer",
        "text": "Yes. Our calculator uses the standard Western legal definition of age, making it suitable for checking statutory age limits for employment, insurance, and legal documents."
      }
    }
  ]
}
</script>
<script type="application/ld+json">
{
  "{{ '@' }}context": "https://schema.org",
  "{{ '@' }}type": "BreadcrumbList",
  "itemListElement": [
    {
      "{{ '@' }}type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "{{ url('/') }}"
    }
  ]
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
                        Free Online Tools
                    </span>
                </div>
                <h1 class="font-display text-display text-on-surface mb-6 leading-[1.05]" data-reveal="fade-up" data-reveal-delay="80" data-reveal-duration="700">
                    Free Age Calculator<br>
                    <span class="text-secondary">&amp; Time Tools</span>
                </h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed max-w-2xl mb-8" data-reveal="fade-up" data-reveal-delay="160" data-reveal-duration="700">
                    Calculate your exact age by date of birth — in years, months, days, hours, and seconds. Plus time calculators, hours calculators, and date tools. All free, all instant, all private.
                </p>
                <div class="flex flex-wrap items-center gap-4" data-reveal="fade-up" data-reveal-delay="240" data-reveal-duration="700">
                    <a href="{{ route('age-calculator') }}" class="group inline-flex items-center gap-3 bg-primary text-on-primary px-8 py-4 rounded-2xl font-h2 text-h2 hover:bg-primary/85 transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5 cursor-pointer">
                        Calculate Your Age Now
                        <span class="material-symbols-outlined transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
                    </a>
                    <div class="flex items-center gap-2.5 text-on-surface-variant font-body-md bg-white/70 backdrop-blur-md px-5 py-2.5 rounded-xl border border-outline-variant/30 shadow-xs">
                        <span class="material-symbols-outlined text-secondary">verified_user</span>
                        100% Client-Side &amp; Private
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
                <div class="flex items-center gap-2 text-sm text-on-surface-variant">
                    <span class="material-symbols-outlined text-secondary text-base">lock</span>
                    Your data never leaves your device
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

    <!-- The Age Calculator That Gets the Math Right -->
    <section class="max-w-4xl mx-auto space-y-8">
        <div data-reveal="fade-up">
            <h2 class="font-h1 text-h1 text-on-surface mb-6">The Age Calculator That Gets the Math Right</h2>
            <div class="space-y-5 font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                <p>
                    Most people know how old they are. But most <strong class="text-on-surface">age calculators</strong> get the exact number wrong — especially around birthdays, leap years, and month boundaries. Ours doesn't.
                </p>
                <p>
                    Enter any date of birth and get your precise age in years, months, and days — updated live, every second. The same calculation works as an <strong class="text-on-surface">age calculator by date of birth</strong> for yourself, your child, or anyone else. No rounding, no estimates.
                </p>
            </div>
        </div>

        <div data-reveal="fade-up">
            <h3 class="font-h2 text-h2 text-on-surface mb-4">How We Calculate Your Exact Age</h3>
            <div class="space-y-5 font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                <p>
                    The math behind a proper <strong class="text-on-surface">date of birth calculator</strong> is more complex than it looks. A simple year subtraction breaks down when your birthday hasn't passed yet this year, or when leap years shift the day count. Our tool works through each month individually — checking the real number of days in each month you've lived through — to give you a result that holds up in legal, medical, and professional contexts.
                </p>
                <p>
                    Beyond years, months, and days, the calculator breaks your life down into total weeks, total days, total hours, and total seconds lived. For anyone who wants to <strong class="text-on-surface">calculate my age</strong> in a way that actually means something, those granular numbers tell a richer story than a single year count ever could.
                </p>
            </div>
        </div>

        <div class="bg-surface-container-lowest border border-outline-variant/40 rounded-2xl p-8" data-reveal="fade-up">
            <h3 class="font-h2 text-h2 text-on-surface mb-4">Age Difference Calculator — Compare Any Two Dates</h3>
            <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                Need to find the gap between two people's ages? Switch to Age Difference mode on the calculator. Enter two birth dates and get the exact difference in years, months, and days — useful for everything from sibling comparisons to legal eligibility checks. It works as a precise <strong class="text-on-surface">age gap calculator</strong> for any two dates, not just birthdays.
            </p>
            <div class="mt-6">
                <a href="{{ route('age-calculator') }}" class="inline-flex items-center gap-2 text-secondary font-h3 hover:gap-3 transition-all duration-300 cursor-pointer">
                    Try the Age Difference Calculator <span class="material-symbols-outlined transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Tool Features Section -->
    <section class="relative overflow-hidden rounded-3xl bg-surface-container-low border border-outline-variant/30 p-8 md:p-14">
        <div class="space-y-8">
            <div data-reveal="fade-up">
                <span class="inline-block text-secondary font-label-caps text-label-caps tracking-widest uppercase mb-3">Tools</span>
                <h2 class="font-h1 text-h1 text-on-surface">Time &amp; Date Tools Built for Real Use</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed mt-3 max-w-2xl">
                    Beyond the <strong>age calculator online</strong>, we're building a complete suite of time and date tools — all free, all private, all instant. Here's what's live and what's coming:
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-reveal="fade-up" data-reveal-delay="100">
                <!-- Tool Card 1 — LIVE -->
                <a href="{{ route('age-calculator') }}" class="group bg-white border border-outline-variant/30 rounded-2xl p-7 hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500 flex flex-col cursor-pointer">
                    <div class="mb-5 w-14 h-14 bg-primary-fixed rounded-2xl flex items-center justify-center text-on-primary-fixed group-hover:bg-secondary group-hover:text-white transition-all duration-300">
                        <span class="material-symbols-outlined text-2xl">cake</span>
                    </div>
                    <div class="flex items-center gap-2 mb-3">
                        <h3 class="font-h2 text-h2 text-on-surface">Exact Age Calculator</h3>
                        <span class="inline-flex items-center gap-1 text-[10px] font-label-caps text-success bg-success/10 px-2 py-0.5 rounded-full">
                            <span class="w-1.5 h-1.5 rounded-full bg-success animate-pulse"></span>Live
                        </span>
                    </div>
                    <p class="font-body-md text-on-surface-variant mb-6 flex-grow leading-relaxed">
                        The most accurate <strong>birth date calculator</strong> available. Enter a date of birth, get your exact age in years, months, days, hours, minutes, and seconds — live, updating every second. Includes zodiac sign, leap years lived, half-birthday, and a full Life Story breakdown.
                    </p>
                    <div class="flex items-center gap-2 text-secondary font-h3 text-sm mt-auto">
                        Use Age Calculator <span class="material-symbols-outlined text-[18px] transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
                    </div>
                </a>

                <!-- Tool Card 2 — Coming Soon -->
                <div class="group bg-white border border-outline-variant/30 rounded-2xl p-7 hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500 flex flex-col cursor-default opacity-80">
                    <div class="mb-5 w-14 h-14 bg-secondary/10 rounded-2xl flex items-center justify-center text-secondary">
                        <span class="material-symbols-outlined text-2xl">timer</span>
                    </div>
                    <div class="flex items-center gap-2 mb-3">
                        <h3 class="font-h2 text-h2 text-on-surface">Time Duration Calculator</h3>
                        <span class="inline-flex items-center text-[10px] font-label-caps text-secondary bg-secondary/10 px-2 py-0.5 rounded-full">Coming Soon</span>
                    </div>
                    <p class="font-body-md text-on-surface-variant mb-6 flex-grow leading-relaxed">
                        Find the exact number of hours, minutes, and seconds between any two times. Perfect for payroll, project tracking, and scheduling. Works as a <strong>time calculator</strong> for any time difference you need.
                    </p>
                </div>

                <!-- Tool Card 3 — Coming Soon -->
                <div class="group bg-white border border-outline-variant/30 rounded-2xl p-7 hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500 flex flex-col cursor-default opacity-80">
                    <div class="mb-5 w-14 h-14 bg-secondary/10 rounded-2xl flex items-center justify-center text-secondary">
                        <span class="material-symbols-outlined text-2xl">date_range</span>
                    </div>
                    <div class="flex items-center gap-2 mb-3">
                        <h3 class="font-h2 text-h2 text-on-surface">Date to Date Calculator</h3>
                        <span class="inline-flex items-center text-[10px] font-label-caps text-secondary bg-secondary/10 px-2 py-0.5 rounded-full">Coming Soon</span>
                    </div>
                    <p class="font-body-md text-on-surface-variant mb-6 flex-grow leading-relaxed">
                        Add or subtract days, weeks, months, or years from any date. Use it as a <strong>date calculator</strong> for deadlines, anniversaries, or any date-based planning you need.
                    </p>
                </div>
            </div>
        </div>
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
                    ['id' => 1, 'q' => 'How do I calculate my exact age by date of birth?', 'a' => 'Enter your date of birth in our age calculator and it instantly shows your exact age in years, months, days, hours, minutes, and seconds. The tool accounts for leap years and the exact number of days in each month, so the result is mathematically precise — not an approximation.'],
                    ['id' => 2, 'q' => 'What is the difference between an age calculator and a date of birth calculator?', 'a' => 'They are the same thing. A date of birth calculator takes your birth date, compares it to today, and returns your age. We use both terms because people search for both — but the tool works the same way regardless of what you call it.'],
                    ['id' => 3, 'q' => 'How does the age difference calculator work?', 'a' => 'Switch to "Age Difference" mode at the top of the calculator. Enter two birth dates and the tool returns the exact gap in years, months, and days. It works as an age gap calculator for any two dates — people, events, or anything else.'],
                    ['id' => 4, 'q' => 'Can I use this as a time calculator for work hours?', 'a' => 'Our time duration calculator (coming soon) will handle work hours, time differences, and scheduling calculations. The age calculator currently shows your total hours and minutes lived as part of its breakdown.'],
                    ['id' => 5, 'q' => 'Is my date of birth stored on your servers?', 'a' => 'No. Every calculation runs locally in your browser using JavaScript. Your birth date never leaves your device and is never stored anywhere on our servers. There are no accounts and no tracking.'],
                    ['id' => 6, 'q' => 'Can I use this for legal or official age verification?', 'a' => 'Yes. Our calculator uses the standard Western legal definition of age — it increases on your birthday, accounts for leap years, and calculates day-by-day rather than year-by-year. This makes it suitable for checking statutory age limits for employment, insurance, and legal documents.'],
                ] as $faq)
                <div class="group bg-white rounded-2xl border border-outline-variant/40 shadow-xs overflow-hidden hover:shadow-md transition-shadow duration-300" data-reveal="fade-up" data-reveal-delay="{{ $loop->index * 60 }}">
                    <button @click="active = active === {{ $faq['id'] }} ? null : {{ $faq['id'] }}" class="w-full flex justify-between items-center p-6 text-left hover:bg-surface-container-low/50 transition-colors cursor-pointer">
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

    <!-- Latest from Blog Section -->
    @php
        $latestPosts = \App\Models\Post::where('is_published', true)->latest('published_at')->take(3)->get();
    @endphp
    @if($latestPosts->count() > 0)
    <section class="space-y-12">
        <div class="flex flex-col md:flex-row justify-between items-end gap-6" data-reveal="fade-up">
            <div class="space-y-4">
                <span class="inline-block text-secondary font-label-caps text-label-caps tracking-widest uppercase">Insights</span>
                <h2 class="font-h1 text-h1 text-on-surface">Latest from Our Blog</h2>
                <p class="text-on-surface-variant font-body-md max-w-xl">Deep dives into time science, productivity, and how to make the most of every second.</p>
            </div>
            <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 text-secondary font-h3 hover:gap-3 transition-all duration-300">
                View All Articles <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($latestPosts as $post)
            <article class="group bg-surface-container-lowest rounded-3xl border border-outline-variant/40 shadow-xs hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500 overflow-hidden flex flex-col" data-reveal="fade-up" data-reveal-delay="{{ $loop->index * 100 }}">
                <div class="p-8 flex flex-col flex-grow">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-[10px] font-label-caps text-secondary bg-secondary/10 px-2.5 py-1 rounded-full uppercase">
                            {{ $post->category?->name ?: 'Insight' }}
                        </span>
                        <span class="text-[10px] font-label-caps text-on-surface-variant/60 uppercase">
                            {{ $post->published_at->format('M d, Y') }}
                        </span>
                    </div>
                    <h3 class="font-h2 text-h2 text-on-surface mb-4 line-clamp-2 group-hover:text-secondary transition-colors">
                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                    </h3>
                    <p class="text-on-surface-variant text-sm leading-relaxed line-clamp-2 mb-6">
                        {{ $post->excerpt ?: str($post->body)->limit(100) }}
                    </p>
                    <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center gap-2 text-secondary font-h3 text-sm mt-auto group/link">
                        Read More <span class="material-symbols-outlined text-[18px] transition-transform duration-300 group-hover/link:translate-x-1">arrow_forward</span>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </section>
    @endif

    <!-- CTA Banner -->
    <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-primary via-primary-container to-secondary-container p-8 md:p-14 text-center" data-reveal="scale-in">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 rounded-full bg-white/20 blur-[80px]"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 rounded-full bg-secondary/20 blur-[60px]"></div>
        </div>
        <div class="relative max-w-2xl mx-auto space-y-6">
            <h2 class="font-h1 text-h1 text-white">Ready to Find Your Exact Age?</h2>
            <p class="text-white/80 font-body-lg text-body-lg leading-relaxed">
                No signup. No data collection. Your date of birth stays on your device. Get a precise result in seconds — down to years, months, days, hours, and seconds.
            </p>
            <div class="flex flex-wrap justify-center gap-4 pt-2">
                <a href="{{ route('age-calculator') }}" class="inline-flex items-center gap-2 bg-white text-primary px-8 py-4 rounded-2xl font-h2 text-h2 hover:bg-white/90 transition-all duration-300 shadow-xl hover:shadow-2xl hover:-translate-y-0.5 cursor-pointer">
                    <span class="material-symbols-outlined">calculate</span>
                    Calculate Now — It's Free
                </a>
            </div>
            <p class="text-white/50 text-sm">Works on any device — desktop, tablet, or phone.</p>
        </div>
    </section>

    <!-- Bottom SEO Content Block -->
    <section class="max-w-4xl mx-auto space-y-6" data-reveal="fade-up">
        <h2 class="font-h1 text-h1 text-on-surface">Free Tools for Every Time &amp; Date Calculation</h2>
        <div class="space-y-5 font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
            <p>
                Time &amp; Date Tools is built around one goal: give you an accurate answer about any date or time question, instantly, without friction. Our <strong class="text-on-surface">age calculator online</strong> is the starting point — enter a date of birth and the result is there in milliseconds, no page reload, no waiting.
            </p>
            <p>
                Whether you need to <strong class="text-on-surface">calculate my age</strong> for a passport form, check the age of majority for a legal matter, find how many days until a birthday, or use a <strong class="text-on-surface">date to date calculator</strong> for project planning — every tool on this site works the same way: instant results, zero data collection, no account required.
            </p>
            <p>
                We're expanding. The <strong class="text-on-surface">time calculator</strong> and <strong class="text-on-surface">hours calculator</strong> tools are in development — designed for HR teams, freelancers, and anyone who tracks time for work. Bookmark this site and come back — every new tool will follow the same standard of accuracy this age calculator is built on.
            </p>
        </div>
    </section>

@endsection

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
    <section class="text-center space-y-stack-md pt-stack-lg">
        <h1 class="font-display text-display text-on-surface">Free Online Calculators &amp; Tools</h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">Fast, accurate, and 100% free tools for your daily tasks.</p>
        <div class="max-w-3xl mx-auto flex gap-base mt-stack-lg relative">
            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">search</span>
            <input class="w-full pl-12 pr-4 py-3 rounded border border-outline-variant focus:border-secondary focus:ring-2 focus:ring-secondary/20 bg-surface-container-lowest text-on-surface font-body-md text-body-md outline-none transition-all" placeholder="Search for tools..." type="text"/>
            <button class="bg-secondary text-on-secondary px-stack-lg py-3 rounded font-h3 text-h3 whitespace-nowrap hover:bg-secondary-container transition-colors">
                Search
            </button>
        </div>
    </section>

    <!-- AdSense Top Placeholder -->
    <div class="adsense-slot mx-auto my-base" style="display:none;">
        <!-- AdSense Slot (Top) -->
    </div>

    <!-- Popular Tools -->
    <section class="space-y-stack-md">
        <h2 class="font-h1 text-h1 text-on-surface text-center">Popular Tools</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-stack-md">
            <!-- Tool Card 1 -->
            <a class="bg-surface-container-lowest border border-surface-variant rounded-lg p-stack-md hover:flat-shadow transition-shadow group flex flex-col h-full cursor-pointer" href="{{ route('age-calculator') }}">
                <div class="mb-stack-sm flex items-center justify-center w-12 h-12 bg-primary-fixed rounded-full text-on-primary-fixed group-hover:bg-secondary group-hover:text-on-secondary transition-colors">
                    <span class="material-symbols-outlined text-[24px]">cake</span>
                </div>
                <h3 class="font-h2 text-h2 text-on-surface mb-base">Exact Age Calculator</h3>
                <p class="font-body-md text-body-md text-on-surface-variant mb-stack-md flex-grow">Calculate your exact age in years, months, and days from your date of birth instantly.</p>
                <div class="font-h3 text-h3 text-secondary flex items-center gap-2 mt-auto">
                    Use Tool <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                </div>
            </a>
           
        </div>
    </section>

    <!-- In-feed Ad Placeholder -->
    <div class="adsense-slot mx-auto my-stack-lg" style="display:none;">
        <!-- AdSense Slot (In-feed) -->
    </div>

    {{-- 
    <!-- Blog Section -->
    <section class="space-y-stack-md">
        <div class="flex justify-between items-end border-b border-surface-variant pb-stack-sm">
            <h2 class="font-h1 text-h1 text-on-surface">Latest Guides &amp; Articles</h2>
            <a class="font-h3 text-h3 text-secondary hover:underline" href="#">View All</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-stack-md">
            <!-- Blog Card 1 -->
            <article class="bg-surface-container-lowest border border-surface-variant rounded-lg overflow-hidden flex flex-col">
                <div class="h-48 bg-surface-container-low relative">
                    <img alt="Blog post thumbnail" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDGvkGdBFu-i0y5KdhZMrES4R4DNncjhVbPUV7i79wPqoz2utoafn9G4uTlKbpnPdvZuJ3yj3yagJmyGSvWD94PTc07z94jLPpy11HssLqGyFwd5OMXfmegovPYeMT1kaFOSQlRvny5qyNekrFeQewDDhfaY1i2nnJkTk8VnFlsXretTEopmLI5V6x3cXd9ySXJZljWy0CA0mG-OLWVyrr-CgAyJDZMo_mmxt_ZwhpOjLunEzPA2ozrS3Twcn5fZoALzk7XKY8mJXzr"/>
                </div>
                <div class="p-stack-md flex flex-col flex-grow">
                    <span class="font-label-caps text-label-caps text-secondary mb-2">Guide</span>
                    <h3 class="font-h2 text-h2 text-on-surface mb-base line-clamp-2">How to Calculate Chronological Age Accurately</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-stack-md flex-grow line-clamp-3">Understanding the precise method to calculate age down to the exact day, ignoring leap year complexities.</p>
                    <a class="inline-block mt-auto px-4 py-2 border border-outline-variant rounded text-on-surface font-h3 text-h3 hover:bg-surface-container-low transition-colors text-center" href="#">
                        Read More
                    </a>
                </div>
            </article>
            <!-- Blog Card 2 -->
            <article class="bg-surface-container-lowest border border-surface-variant rounded-lg overflow-hidden flex flex-col">
                <div class="h-48 bg-surface-container-low relative">
                    <img alt="Blog post thumbnail" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDWPJT0P3WqBD-qSPL8Q0fqEsyR9hohmYL-u0mSThUIJ_BTMsUWI8B1R9AjCg-bdNEjuFOKo-uV9thoUhyfFFnzxSJRs0P_aTUT8zuJqkKov7jUZcNlNQx0gzwVGq3q5OxEU2B5bIA7qQ7CQLq2A3et7ool2A3al-zNG2wvyDadSmHft6ML3cKOAZ29n6o0qpThBYcUgLizPc6K1B34VLVOnNhoQunL50R-5n5kD386psqGjWhiBsHtAW_MJPftPJsNsFvumxXiaDLg"/>
                </div>
                <div class="p-stack-md flex flex-col flex-grow">
                    <span class="font-label-caps text-label-caps text-secondary mb-2">Tips</span>
                    <h3 class="font-h2 text-h2 text-on-surface mb-base line-clamp-2">Mastering the Date Calculator for Project Management</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-stack-md flex-grow line-clamp-3">Learn how project managers utilize date calculators to accurately predict milestones and delivery dates.</p>
                    <a class="inline-block mt-auto px-4 py-2 border border-outline-variant rounded text-on-surface font-h3 text-h3 hover:bg-surface-container-low transition-colors text-center" href="#">
                        Read More
                    </a>
                </div>
            </article>
            <!-- Blog Card 3 -->
            <article class="bg-surface-container-lowest border border-surface-variant rounded-lg overflow-hidden flex flex-col">
                <div class="h-48 bg-surface-container-low relative">
                    <img alt="Blog post thumbnail" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuApn6B5NLJw_kHvMiUvk8h5tXbVpyx1wh7fR9rlWrCiUGhthN77PqgWD4oEEcvIWYo9oS6wtO2lHaYMXYFHKgvltq_mMd4fun2-rU3FsxqeYuRJPKDeoGItuYclhpleAC655A7mOoHWLc_h_kHeHnPr3GufkDF8jAbgJGSskQH5c24X8P7TtBuSITfjfsOJGlT8HOoCNRLN_WcvehZyrtRa6J4UFEDIUI1NiO8JRI8sFA8Hc-VoxtJP9-8DYXZ4D6a5ZA27pPAk0PAI"/>
                </div>
                <div class="p-stack-md flex flex-col flex-grow">
                    <span class="font-label-caps text-label-caps text-secondary mb-2">News</span>
                    <h3 class="font-h2 text-h2 text-on-surface mb-base line-clamp-2">Daylight Saving Time Updates for 2024</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-stack-md flex-grow line-clamp-3">A comprehensive breakdown of which regions are observing DST changes this year and how it affects global meetings.</p>
                    <a class="inline-block mt-auto px-4 py-2 border border-outline-variant rounded text-on-surface font-h3 text-h3 hover:bg-surface-container-low transition-colors text-center" href="#">
                        Read More
                    </a>
                </div>
            </article>
        </div>
    </section>
    --}}

    <!-- SEO Article Section -->
    <section class="mt-section-gap pt-12 border-t border-outline-variant/30">
        <div class="max-w-4xl mx-auto space-y-12">
            <header class="text-center space-y-4">
                <h2 class="font-h1 text-h1 text-on-surface">The Ultimate Exact Age Calculator & Life Progress Tracker</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                    Welcome to the most precise and engaging age calculator on the web. Whether you need to calculate your chronological age for a job application, an official document, or simply want a reliable birth date calculator to check your exact age in years, months, and days, our tool is built to provide instant, flawless results.
                </p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant/50 shadow-sm">
                    <h3 class="font-h3 text-h3 text-on-surface mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-secondary">auto_stories</span>
                        Go Beyond Numbers: Discover Your "Life Story"
                    </h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6">
                        We believe that your time is your most valuable asset, and a simple number doesn't tell the whole story. That is why our platform goes beyond a standard age calculator. With a single click, you can unlock your unique "Life Story" mode. Discover fascinating milestones about your journey:
                    </p>
                    <ul class="space-y-4">
                        <li class="flex gap-3">
                            <span class="material-symbols-outlined text-secondary shrink-0">calendar_month</span>
                            <span class="font-body-md text-on-surface"><strong class="text-secondary">The 4,000 Weeks Perspective:</strong> See exactly how many weeks you have lived and how many weekends you have left to make an impact.</span>
                        </li>
                        <li class="flex gap-3">
                            <span class="material-symbols-outlined text-secondary shrink-0">favorite</span>
                            <span class="font-body-md text-on-surface"><strong class="text-secondary">Your Biological Engine:</strong> Find out the massive number of heartbeats and breaths your body has taken since the day you were born.</span>
                        </li>
                        <li class="flex gap-3">
                            <span class="material-symbols-outlined text-secondary shrink-0">history_edu</span>
                            <span class="font-body-md text-on-surface"><strong class="text-secondary">Historical Trivia:</strong> Instantly discover which globally hit movie and song were released the year your journey began.</span>
                        </li>
                    </ul>
                </div>

                <div class="space-y-6">
                    <div class="bg-white p-6 rounded-xl border border-outline-variant/30">
                        <h3 class="font-h3 text-h3 text-on-surface mb-3 flex items-center gap-2">
                            <span class="material-symbols-outlined text-secondary">shield_lock</span>
                            100% Private & Secure
                        </h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">
                            Your personal data belongs to you. Unlike other platforms that might track your inputs, our age calculator processes everything directly inside your local browser. Your date of birth and milestones are never uploaded or saved to our servers.
                        </p>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-outline-variant/30">
                        <h3 class="font-h3 text-h3 text-on-surface mb-3 flex items-center gap-2">
                            <span class="material-symbols-outlined text-secondary">bolt</span>
                            Lightning-Fast Precision
                        </h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">
                            No account creation or subscriptions. Whether you are a professional calculating statutory age limits or a parent tracking a child's exact age, our responsive interface guarantees a seamless experience on any device.
                        </p>
                    </div>
                </div>
            </div>

            <article class="prose prose-slate max-w-none space-y-8 pt-8">
                <div class="space-y-4">
                    <h2 class="font-h2 text-h2 text-on-surface">Why Precision Matters in a Date and Time Calculator</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                        When we talk about measuring time, accuracy is everything. A standard days calculator might simply subtract two dates, but true chronological tracking requires much more. It involves calculating leap years, understanding varying month durations, and adjusting for historical calendar shifts. We built our platform to be the most reliable date and time calculator you will ever use, ensuring that whether you are counting days for a legal document or tracking milestones, the math is flawless.
                    </p>
                </div>

                <div class="space-y-4">
                    <h2 class="font-h2 text-h2 text-on-surface">The Philosophy Behind Chronological Age</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                        Age is often viewed as just a number, but we see it as a journey. The concept of tracking your exact age down to the days, minutes, and even heartbeats offers a fresh perspective on life.
                        Did you know the average human lifespan is roughly 4,000 weeks? By using our advanced birth date calculator, you don't just find out how old you are; you gain a profound understanding of the time you have spent and the time you have ahead. This "Life Story" approach turns a basic calculation into an insightful experience, motivating you to make every weekend and every milestone count.
                    </p>
                </div>

                <div class="rounded-2xl border border-primary-fixed/20">
                    <h2 class="font-h2 text-h2 text-on-surface mb-4">The Future of Browser-Based Tools</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-0">
                        In an era where digital privacy is constantly under threat, we are proud to offer a completely secure alternative. Many online tools send your personal inputs, like your date of birth, to remote servers for processing. Our architecture is different. Every calculation performed on our age calculator and time duration tools happens strictly within your local web browser. We do not use databases to store your personal queries. This local-processing method not only guarantees absolute privacy but also delivers instant, zero-lag results regardless of your internet connection speed.
                    </p>
                </div>
            </article>
        </div>
    </section>
@endsection

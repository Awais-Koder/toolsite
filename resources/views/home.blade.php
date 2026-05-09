@extends('layouts.app')

@section('title', 'Time & Date Tools - Free Online Calculators')
@section('meta_description', 'Explore a variety of free online time and date tools, including an exact age calculator, date difference tool, and more.')

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
    <div class="w-full max-w-[728px] h-[90px] mx-auto bg-surface-container-high border border-dashed border-outline-variant flex items-center justify-center relative">
        <span class="font-label-caps text-label-caps text-outline absolute top-2">Advertisement</span>
        <span class="text-on-surface-variant opacity-50">728x90 Leaderboard Placeholder</span>
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
            <!-- Tool Card 2 -->
            <a class="bg-surface-container-lowest border border-surface-variant rounded-lg p-stack-md hover:flat-shadow transition-shadow group flex flex-col h-full cursor-pointer" href="#" x-on:click.prevent="$dispatch('open-coming-soon')">
                <div class="mb-stack-sm flex items-center justify-center w-12 h-12 bg-primary-fixed rounded-full text-on-primary-fixed group-hover:bg-secondary group-hover:text-on-secondary transition-colors">
                    <span class="material-symbols-outlined text-[24px]">hourglass_bottom</span>
                </div>
                <h3 class="font-h2 text-h2 text-on-surface mb-base">Time Duration</h3>
                <p class="font-body-md text-body-md text-on-surface-variant mb-stack-md flex-grow">Find out exactly how many hours, minutes, and seconds are between two specific times.</p>
                <div class="font-h3 text-h3 text-secondary flex items-center gap-2 mt-auto">
                    Use Tool <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                </div>
            </a>
            
            <!-- Tool Card 3 -->
            <a class="bg-surface-container-lowest border border-surface-variant rounded-lg p-stack-md hover:flat-shadow transition-shadow group flex flex-col h-full cursor-pointer" href="#" x-on:click.prevent="$dispatch('open-coming-soon')">
                <div class="mb-stack-sm flex items-center justify-center w-12 h-12 bg-primary-fixed rounded-full text-on-primary-fixed group-hover:bg-secondary group-hover:text-on-secondary transition-colors">
                    <span class="material-symbols-outlined text-[24px]">calendar_month</span>
                </div>
                <h3 class="font-h2 text-h2 text-on-surface mb-base">Date Calculator</h3>
                <p class="font-body-md text-body-md text-on-surface-variant mb-stack-md flex-grow">Add or subtract days, weeks, months, or years from a given date easily.</p>
                <div class="font-h3 text-h3 text-secondary flex items-center gap-2 mt-auto">
                    Use Tool <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                </div>
            </a>
           
        </div>
    </section>

    <!-- In-feed Ad Placeholder -->
    <div class="w-full max-w-[300px] h-[250px] mx-auto bg-surface-container-high border border-dashed border-outline-variant flex items-center justify-center relative my-stack-lg">
        <span class="font-label-caps text-label-caps text-outline absolute top-2">Advertisement</span>
        <span class="text-on-surface-variant opacity-50">300x250 Medium Rectangle</span>
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

    <!-- SEO Text Section -->
    <section class="max-w-[900px] mx-auto space-y-stack-md py-stack-lg bg-surface-container-lowest p-stack-lg rounded-xl border border-surface-variant">
        <h2 class="font-h1 text-h1 text-on-surface">Your Reliable Suite of Time and Date Utilities</h2>
        <div class="space-y-6 font-body-md text-body-md text-on-surface-variant">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-3">
                    <h3 class="font-h3 text-secondary">Precision You Can Trust</h3>
                    <p>
                        In a world where every second counts, our tools are built on robust mathematical algorithms that account for all time-related anomalies. From leap years in our <strong>Exact Age Calculator</strong> to daylight saving transitions, we ensure that the data you receive is accurate down to the smallest unit.
                    </p>
                </div>
                <div class="space-y-3">
                    <h3 class="font-h3 text-secondary">Privacy First</h3>
                    <p>
                        We believe your data belongs to you. All calculations performed on <strong>Time&Date Tools</strong> happen locally in your browser. This means your birth dates, event timings, and personal milestones are never stored on our servers, providing a secure and private experience.
                    </p>
                </div>
                <div class="space-y-3">
                    <h3 class="font-h3 text-secondary">Designed for Simplicity</h3>
                    <p>
                        No account creation, no subscriptions, and no hidden fees. Our mission is to provide high-utility tools with a premium design aesthetic that makes navigation effortless. Whether you're on a desktop or a mobile device, our responsive interface ensures a seamless experience.
                    </p>
                </div>
                <div class="space-y-3">
                    <h3 class="font-h3 text-secondary">More Than Just Numbers</h3>
                    <p>
                        We strive to make data meaningful. Our tools don't just provide raw results; they offer context. Discover historical facts associated with your milestones, visualize your life progress, and gain new perspectives on how you spend your most valuable asset: time.
                    </p>
                </div>
            </div>
            
            <div class="pt-6 border-t border-surface-variant">
                <h3 class="font-h3 text-on-surface mb-3">Comprehensive Coverage for Every Need</h3>
                <p>
                    From legal professionals determining statutory ages to parents tracking their child's growth, our tools serve a diverse range of purposes. We are constantly expanding our library of calculators—including <strong>Time Duration</strong>, <strong>Date Difference</strong>, and <strong>Business Day Calculators</strong>—to become your ultimate destination for everything time-related.
                </p>
            </div>
        </div>
    </section>

    <!-- SEO Content Section -->
    <section class="max-w-[1200px] mx-auto px-gutter py-section-gap">
        <div class="bg-surface-container-low rounded-2xl border border-outline-variant p-stack-lg space-y-stack-md">
            <h2 class="font-h2 text-h2 text-on-surface">The Ultimate Hub for Free Online Time & Date Calculators</h2>
            <p class="font-body-lg text-on-surface-variant leading-relaxed">
                Whether you need to figure out the exact number of days between two events, manage your work hours, or find out your exact age, Time&Date Tools has you covered. We offer a comprehensive suite of highly accurate, instant, and 100% free online calculators designed to make your daily computations effortless.
            </p>

            <div class="grid md:grid-cols-2 gap-stack-lg pt-6">
                <div class="space-y-4">
                    <h3 class="font-h3 text-h3 text-secondary">The Most Accurate Age & Birth Date Calculator</h3>
                    <p class="text-on-surface-variant">
                        Have you ever wondered exactly how many days, weeks, or even heartbeats you have experienced since you were born? Our highly advanced age calculator goes far beyond basic math. Acting as a precise birth date calculator, it not only tells you your chronological age in years, months, and days but also unlocks your "Life Story." Find out your life's progress, what hit movie was released in your birth year, and exactly how many days are left until your next big milestone.
                    </p>
                </div>

                <div class="space-y-4">
                    <h3 class="font-h3 text-h3 text-secondary">Seamless Date to Date & Time Duration Calculators</h3>
                    <p class="text-on-surface-variant">
                        Planning a project deadline or counting down to a special event? Our date to date calculator makes it incredibly simple to add or subtract days from a specific date. If you need to track hours and minutes, our time duration calculator (often used as a reliable time calculator for scheduling) gives you the exact difference between two specific times. We've optimized our date and time calculator tools to handle leap years, differing month lengths, and complex time values so you don't have to.
                    </p>
                </div>

                <div class="space-y-4">
                    <h3 class="font-h3 text-h3 text-secondary">Manage Your Work with Days & Time Calculators</h3>
                    <p class="text-on-surface-variant">
                        Professionals, HR managers, and freelancers love our platform for quick verifications. While our days calculator helps you count business days or total calendar days instantly, you can also use our specialized time card calculator and time clock calculator concepts to estimate hours worked.
                    </p>
                </div>

                <div class="space-y-4">
                    <h3 class="font-h3 text-h3 text-secondary">100% Private, Fast, and Secure</h3>
                    <p class="text-on-surface-variant">
                        Unlike other platforms, every date time calculator on our site runs entirely in your browser using modern web technologies. This means your data is never uploaded to external servers. Your calculations are lightning-fast, highly secure, and completely private.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('title', 'Time&Date Tools - Free Online Calculators & Tools')

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
            <a class="bg-surface-container-lowest border border-surface-variant rounded-lg p-stack-md hover:flat-shadow transition-shadow group flex flex-col h-full cursor-pointer" href="#">
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
            <a class="bg-surface-container-lowest border border-surface-variant rounded-lg p-stack-md hover:flat-shadow transition-shadow group flex flex-col h-full cursor-pointer" href="#">
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

    <!-- SEO Text Section -->
    <section class="max-w-[800px] mx-auto space-y-stack-md py-stack-lg bg-surface-container-lowest p-stack-lg rounded-xl border border-surface-variant">
        <h2 class="font-h1 text-h1 text-on-surface">Why Use Our Free Calculators?</h2>
        <div class="space-y-4 font-body-md text-body-md text-on-surface-variant">
            <p>
                Navigating daily scheduling, project deadlines, or simply satisfying curiosity requires precision. Our suite of free online time and date calculators is engineered to provide instant, accurate results without unnecessary friction. Whether you are a professional calculating billable hours or planning an international conference call across multiple time zones, our tools are designed with clarity and speed in mind.
            </p>
            <p>
                We prioritize user experience by offering a distraction-free, minimalist interface. All calculations are performed instantly in your browser, ensuring your data remains private. From chronological age determination to complex business day calculations, Time&amp;Date Tools is your reliable, go-to utility for all chronological computations.
            </p>
        </div>
    </section>
@endsection

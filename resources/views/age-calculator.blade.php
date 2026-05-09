@extends('layouts.app')

@section('title', 'Exact Age Calculator - Time&Date Tools')

@section('content')
    <div class="flex flex-col lg:flex-row gap-gutter">
        <!-- Left Column (2/3) -->
        <div class="w-full lg:w-[752px] flex flex-col gap-stack-lg">
            <!-- Tool Interface -->
            <section class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant p-6 sm:p-8">
                <h1 class="font-h1 text-on-surface mb-2">Exact Age Calculator</h1>
                <p class="text-on-surface-variant mb-6 font-body-md">Calculate your exact age in years, months, and days down to the specific date.</p>
                <div class="flex flex-col sm:flex-row gap-stack-md mb-6">
                    <div class="flex-1">
                        <label class="block font-label-caps text-on-surface mb-2 uppercase" for="dob">Date of Birth</label>
                        <div class="relative">
                            <input class="form-input w-full rounded-lg border-outline focus:border-secondary focus:ring-secondary h-12 px-4 text-on-surface bg-surface-container-lowest font-body-md" id="dob" type="date"/>
                        </div>
                    </div>
                    <div class="flex-1">
                        <label class="block font-label-caps text-on-surface mb-2 uppercase" for="calc-date">Calculate Age At</label>
                        <div class="relative">
                            <input class="form-input w-full rounded-lg border-outline focus:border-secondary focus:ring-secondary h-12 px-4 text-on-surface bg-surface-container-lowest font-body-md" id="calc-date" type="date" value="{{ date('Y-m-d') }}"/>
                        </div>
                    </div>
                </div>
                <button class="w-full sm:w-auto bg-secondary hover:bg-secondary-container text-on-secondary font-mono-data py-3 px-8 rounded-lg transition-colors shadow-sm flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">calculate</span>
                    Calculate Age
                </button>
                <!-- Results Area (Hidden by default, fixed min-height for CLS) -->
                <div id="results" class="mt-8 min-h-[120px] bg-surface-container rounded-lg border border-outline-variant p-6 hidden">
                    <div class="text-center text-outline font-body-md">Results will appear here</div>
                </div>
            </section>

            <!-- SEO Article -->
            <article class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant p-6 sm:p-8">
                <h2 class="font-h2 text-on-surface mt-0 mb-stack-md">How to Use the Age Calculator</h2>
                <section class="mb-stack-md">
                    <h3 class="font-h3 text-on-surface mb-3">Introduction</h3>
                    <p class="text-on-surface-variant font-body-md">
                        Determining someone's exact age can sometimes be confusing, especially when accounting for leap years and months with varying lengths. Our Exact Age Calculator simplifies this process, providing you with an accurate breakdown of your age in years, months, and days. Whether you need it for filling out official documents, planning events, or simple curiosity, this tool offers precise results instantly.
                    </p>
                </section>
                <section class="mb-stack-md">
                    <h3 class="font-h3 text-on-surface mb-3">Step-by-Step Guide</h3>
                    <ol class="list-decimal pl-5 text-on-surface-variant font-body-md space-y-2">
                        <li>Enter your precise Date of Birth in the first field using the calendar picker.</li>
                        <li>Select the target date in the "Calculate Age At" field. It defaults to today's date, but you can change it to find your age on a future or past date.</li>
                        <li>Click the "Calculate Age" button to view your results instantly below the form.</li>
                    </ol>
                </section>
                <section class="mb-stack-md">
                    <h3 class="font-h3 text-on-surface mb-3">Age Calculation Formula</h3>
                    <p class="text-on-surface-variant font-body-md">
                        The calculator works by subtracting the birth date from the target date. If the current day is less than the birth day, it borrows a month. If the current month is less than the birth month, it borrows a year. This ensures accurate calculation regardless of leap years or month lengths.
                    </p>
                </section>
                <section>
                    <h3 class="font-h3 text-on-surface mb-4">Frequently Asked Questions</h3>
                    <div class="space-y-4">
                        <div class="border border-outline-variant rounded-lg overflow-hidden">
                            <div class="bg-surface-container-low px-4 py-3 flex justify-between items-center cursor-pointer hover:bg-surface-container transition-colors">
                                <h4 class="font-body-md font-medium text-on-surface m-0">How is age calculated exactly?</h4>
                                <span class="material-symbols-outlined text-outline">expand_more</span>
                            </div>
                        </div>
                        <div class="border border-outline-variant rounded-lg overflow-hidden">
                            <div class="bg-surface-container-low px-4 py-3 flex justify-between items-center cursor-pointer hover:bg-surface-container transition-colors">
                                <h4 class="font-body-md font-medium text-on-surface m-0">Does this account for leap years?</h4>
                                <span class="material-symbols-outlined text-outline">expand_more</span>
                            </div>
                        </div>
                    </div>
                </section>
            </article>
        </div>

        <!-- Right Column (1/3) -->
        <aside class="w-full lg:w-[400px] flex flex-col gap-stack-lg">
            <div class="sticky top-24 flex flex-col gap-stack-lg">
                <!-- AdSense Placeholder 300x250 -->
                <div class="w-full flex justify-center bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant p-4">
                    <div class="w-[300px] h-[250px] bg-surface-dim flex items-center justify-center text-outline text-sm border border-dashed border-outline-variant font-mono-data">
                        Advertisement (300x250)
                    </div>
                </div>
                <!-- Related Tools Widget -->
                <div class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant p-6">
                    <h3 class="font-h3 text-on-surface mb-4 pb-2 border-b border-outline-variant">Related Tools</h3>
                    <ul class="space-y-3">
                        <li>
                            <a class="flex items-center gap-3 text-on-surface-variant hover:text-secondary transition-colors group" href="#">
                                <div class="bg-surface-container-low text-on-surface p-2 rounded-lg group-hover:bg-secondary group-hover:text-on-secondary transition-colors border border-outline-variant group-hover:border-secondary">
                                    <span class="material-symbols-outlined text-xl block">timer</span>
                                </div>
                                <span class="font-body-md font-medium">Time Duration Calculator</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center gap-3 text-on-surface-variant hover:text-secondary transition-colors group" href="#">
                                <div class="bg-surface-container-low text-on-surface p-2 rounded-lg group-hover:bg-secondary group-hover:text-on-secondary transition-colors border border-outline-variant group-hover:border-secondary">
                                    <span class="material-symbols-outlined text-xl block">event</span>
                                </div>
                                <span class="font-body-md font-medium">Date Calculator</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center gap-3 text-on-surface-variant hover:text-secondary transition-colors group" href="#">
                                <div class="bg-surface-container-low text-on-surface p-2 rounded-lg group-hover:bg-secondary group-hover:text-on-secondary transition-colors border border-outline-variant group-hover:border-secondary">
                                    <span class="material-symbols-outlined text-xl block">schedule</span>
                                </div>
                                <span class="font-body-md font-medium">Hours Calculator</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Exact Age Calculator - Calculate Your Precise Age Online')
@section('meta_description', 'Free exact age calculator to find your age in years, months, days, and even seconds. Discover your zodiac sign, life story stats, and fun facts.')

@section('content')
    <div class="flex flex-col lg:flex-row gap-gutter" x-data="ageCalculator()" x-init="init()">
        <!-- Left Column (2/3) -->
        <div class="lg:w-2/3 flex flex-col gap-stack-lg order-2 lg:order-1">
            
            <!-- AdSense Top Placeholder -->
            <div class="adsense-slot mx-auto my-base" style="display:none;">
                <!-- AdSense Slot (Top) -->
            </div>
            
            <!-- Tool Interface -->
            <section class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant p-6 sm:p-8">
                <h1 class="font-h1 text-on-surface mb-2" x-text="mode === 'age' ? 'Exact Age Calculator' : 'Age Difference Calculator'">Exact Age Calculator</h1>
                <p class="text-on-surface-variant mb-6 font-body-md" x-text="mode === 'age' ? 'Calculate your exact age in years, months, days, hours, minutes, and seconds.' : 'Calculate the exact time difference between two different birth dates.'"></p>
                
                <!-- Mode Toggle -->
                <div class="flex bg-surface-container-low p-1 rounded-xl border border-outline-variant mb-6 w-fit">
                    <button x-on:click="mode = 'age'; resetData();" :class="mode === 'age' ? 'bg-secondary text-on-secondary shadow-sm' : 'text-on-surface-variant hover:bg-surface-container-high'" class="px-6 py-2 rounded-lg font-label-caps transition-all duration-200">
                        Age Calculator
                    </button>
                    <button x-on:click="mode = 'diff'; resetData();" :class="mode === 'diff' ? 'bg-secondary text-on-secondary shadow-sm' : 'text-on-surface-variant hover:bg-surface-container-high'" class="px-6 py-2 rounded-lg font-label-caps transition-all duration-200">
                        Age Difference
                    </button>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-stack-md mb-6">
                    <div class="flex-1">
                        <label class="block font-label-caps text-on-surface mb-2 uppercase" x-text="mode === 'age' ? 'Your Name (Optional)' : 'Person 1 Name'"></label>
                        <input x-model="p1Name" placeholder="Enter name" class="form-input w-full rounded-lg border-outline focus:border-secondary focus:ring-secondary h-12 px-4 text-on-surface bg-surface-container-lowest font-body-md border" type="text"/>
                    </div>
                    <div class="flex-1" x-show="mode === 'diff'">
                        <label class="block font-label-caps text-on-surface mb-2 uppercase">Person 2 Name</label>
                        <input x-model="p2Name" placeholder="Enter name" class="form-input w-full rounded-lg border-outline focus:border-secondary focus:ring-secondary h-12 px-4 text-on-surface bg-surface-container-lowest font-body-md border" type="text"/>
                    </div>
                    <div class="flex-1">
                        <label class="block font-label-caps text-on-surface mb-2 uppercase" for="dob" x-text="mode === 'age' ? 'Date of Birth' : (p1Name || 'Person 1') + '\'s Birth Date'"></label>
                        <input x-model="dob" class="form-input w-full rounded-lg border-outline focus:border-secondary focus:ring-secondary h-12 px-4 text-on-surface bg-surface-container-lowest font-body-md border" id="dob" type="date"/>
                    </div>
                    <div class="flex-1">
                        <label class="block font-label-caps text-on-surface mb-2 uppercase" for="calc-date" x-text="mode === 'age' ? 'Calculate Age At' : (p2Name || 'Person 2') + '\'s Birth Date'"></label>
                        <input x-model="targetDate" class="form-input w-full rounded-lg border-outline focus:border-secondary focus:ring-secondary h-12 px-4 text-on-surface bg-surface-container-lowest font-body-md border" id="calc-date" type="date"/>
                    </div>
                </div>

                <button x-on:click="calculate()" class="w-full sm:w-auto bg-secondary hover:bg-secondary-container text-on-secondary font-mono-data py-3 px-8 rounded-lg transition-colors shadow-sm flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">calculate</span>
                    <span x-text="mode === 'age' ? 'Calculate Age' : 'Calculate Difference'"></span>
                </button>

                <!-- Results Area -->
                <div x-show="showResults" x-transition class="mt-8 bg-surface-container-low rounded-lg border border-outline-variant p-6" x-cloak>
                    <!-- Tab Navigation -->
                    <div class="flex bg-surface-container-lowest p-1 rounded-xl border border-outline-variant mb-6 overflow-x-auto">
                        <button x-on:click="activeTab = 'results'" :class="activeTab === 'results' ? 'bg-secondary text-on-secondary shadow-sm' : 'text-on-surface-variant hover:bg-surface-container-high'" class="flex-1 min-w-0 px-4 py-2.5 rounded-lg font-label-caps transition-all duration-200 flex items-center justify-center gap-2 whitespace-nowrap">
                            <span class="material-symbols-outlined text-base">analytics</span>
                            <span>Results</span>
                        </button>
                        <button x-on:click="activeTab = 'facts'" :class="activeTab === 'facts' ? 'bg-secondary text-on-secondary shadow-sm' : 'text-on-surface-variant hover:bg-surface-container-high'" class="flex-1 min-w-0 px-4 py-2.5 rounded-lg font-label-caps transition-all duration-200 flex items-center justify-center gap-2 whitespace-nowrap">
                            <span class="material-symbols-outlined text-base">celebration</span>
                            <span>Fun Facts</span>
                        </button>
                        <button x-on:click="activeTab = 'story'" :class="activeTab === 'story' ? 'bg-secondary text-on-secondary shadow-sm' : 'text-on-surface-variant hover:bg-surface-container-high'" class="flex-1 min-w-0 px-4 py-2.5 rounded-lg font-label-caps transition-all duration-200 flex items-center justify-center gap-2 whitespace-nowrap">
                            <span class="material-symbols-outlined text-base">auto_stories</span>
                            <span>Life Story</span>
                        </button>
                    </div>
                    <!-- TAB: Results -->
                    <div x-show="activeTab === 'results'" class="w-full">
                        <div class="text-center mb-8">
                            <div class="text-on-surface-variant font-label-caps uppercase mb-4 tracking-widest text-sm" x-text="mode === 'age' ? 'Exact Age Result' : 'Age Difference Result'">Exact Age Result</div>
                            
                            <template x-if="mode === 'diff'">
                                <div class="mb-6 p-4 bg-primary-fixed/10 border border-primary-fixed/20 rounded-lg">
                                    <div class="text-lg font-bold text-primary flex items-center justify-center gap-2">
                                        <span class="material-symbols-outlined">info</span>
                                        <span x-text="result.comparisonText"></span>
                                    </div>
                                </div>
                            </template>

                            <!-- Y-M-D Grid -->
                            <div class="grid grid-cols-3 gap-4 mb-4">
                                <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm">
                                    <div class="text-h1 text-secondary leading-none mb-1" x-text="result.years">0</div>
                                    <div class="text-label-caps text-on-surface-variant font-semibold">YEARS</div>
                                </div>
                                <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm">
                                    <div class="text-h1 text-secondary leading-none mb-1" x-text="result.months">0</div>
                                    <div class="text-label-caps text-on-surface-variant font-semibold">MONTHS</div>
                                </div>
                                <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm">
                                    <div class="text-h1 text-secondary leading-none mb-1" x-text="result.days">0</div>
                                    <div class="text-label-caps text-on-surface-variant font-semibold">DAYS</div>
                                </div>
                            </div>

                            <!-- H-M-S Grid -->
                            <div class="grid grid-cols-3 gap-4">
                                <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm">
                                    <div class="text-h2 text-secondary leading-none mb-1" x-text="result.hours">0</div>
                                    <div class="text-label-caps text-on-surface-variant font-semibold">HOURS</div>
                                </div>
                                <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm">
                                    <div class="text-h2 text-secondary leading-none mb-1" x-text="result.minutes">0</div>
                                    <div class="text-label-caps text-on-surface-variant font-semibold">MINUTES</div>
                                </div>
                                <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm">
                                    <div class="text-h2 text-secondary leading-none mb-1" x-text="result.seconds">0</div>
                                    <div class="text-label-caps text-on-surface-variant font-semibold">SECONDS</div>
                                </div>
                            </div>
                        </div>

                        <!-- Individual Summaries (Difference Mode) -->
                        <template x-if="mode === 'diff'">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                                <div class="p-4 bg-surface-container-lowest border border-outline-variant rounded-lg">
                                    <div class="font-label-caps text-on-surface-variant mb-2" x-text="(p1Name || 'PERSON 1') + ' AGE (TODAY)'"></div>
                                    <div class="text-on-surface font-bold text-lg" x-text="result.p1AgeSummary"></div>
                                </div>
                                <div class="p-4 bg-surface-container-lowest border border-outline-variant rounded-lg">
                                    <div class="font-label-caps text-on-surface-variant mb-2" x-text="(p2Name || 'PERSON 2') + ' AGE (TODAY)'"></div>
                                    <div class="text-on-surface font-bold text-lg" x-text="result.p2AgeSummary"></div>
                                </div>
                            </div>
                        </template>

                        <!-- Granular Breakdown -->
                        <div class="mt-8 pt-8 border-t border-outline-variant">
                            <h3 class="font-h3 text-on-surface mb-6 flex items-center gap-2">
                                <span class="material-symbols-outlined text-secondary">analytics</span>
                                <span x-text="mode === 'age' ? 'Granular Breakdown' : 'Difference Breakdown'">Granular Breakdown</span>
                            </h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-8">
                                <div class="flex justify-between items-center py-2 border-b border-outline-variant/50">
                                    <span class="text-on-surface-variant">Total Months</span>
                                    <span class="font-mono-data text-on-surface font-bold text-lg" x-text="result.totalMonths.toLocaleString()"></span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-outline-variant/50">
                                    <span class="text-on-surface-variant">Total Weeks</span>
                                    <span class="font-mono-data text-on-surface font-bold text-lg" x-text="result.totalWeeks.toLocaleString()"></span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-outline-variant/50">
                                    <span class="text-on-surface-variant">Total Days</span>
                                    <span class="font-mono-data text-on-surface font-bold text-lg" x-text="result.totalDays.toLocaleString()"></span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-outline-variant/50">
                                    <span class="text-on-surface-variant">Total Hours</span>
                                    <span class="font-mono-data text-on-surface font-bold text-lg" x-text="result.totalHours.toLocaleString()"></span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-outline-variant/50">
                                    <span class="text-on-surface-variant">Total Minutes</span>
                                    <span class="font-mono-data text-on-surface font-bold text-lg" x-text="result.totalMinutes.toLocaleString()"></span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-outline-variant/50">
                                    <span class="text-on-surface-variant">Total Seconds</span>
                                    <span class="font-mono-data text-secondary font-bold text-lg" x-text="result.totalSeconds.toLocaleString()"></span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 p-4 bg-surface-container-lowest rounded border border-secondary/20 text-center">
                            <p class="text-on-surface-variant font-body-md" x-text="'Result: ' + summaryText"></p>
                        </div>
                    </div>

                    <!-- TAB: Fun Facts & Milestones -->
                    <div x-show="activeTab === 'facts'" class="w-full">
                        <div class="text-left">
                            <h3 class="font-h3 text-on-surface mb-6 flex items-center gap-2">
                                <span class="material-symbols-outlined text-secondary">celebration</span>
                                Fun Facts & Milestones
                            </h3>
                            <div class="grid gap-8" :class="mode === 'age' ? 'grid-cols-1' : 'grid-cols-1 sm:grid-cols-2'">
                                <!-- Profile 1 -->
                                <div class="space-y-4">
                                    <div class="font-label-caps text-secondary font-bold border-b border-outline-variant pb-2" x-text="mode === 'age' ? 'Your Profile' : (p1Name || 'Person 1') + '\'s Profile'"></div>
                                    <div class="grid gap-4" :class="mode === 'age' ? 'grid-cols-1 sm:grid-cols-2' : 'grid-cols-1'">
                                        <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm flex items-center gap-4">
                                            <div class="bg-primary-fixed p-3 rounded-full text-on-primary-fixed shrink-0">
                                                <span class="material-symbols-outlined block text-xl">event_repeat</span>
                                            </div>
                                            <div>
                                                <div class="text-label-caps text-on-surface-variant text-xs">Day of Birth</div>
                                                <div class="font-h3 text-on-surface" x-text="result.birthDay">Friday</div>
                                            </div>
                                        </div>
                                        <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm flex items-center gap-4">
                                            <div class="bg-primary-fixed p-3 rounded-full text-on-primary-fixed shrink-0">
                                                <span class="material-symbols-outlined block text-xl">star_half</span>
                                            </div>
                                            <div>
                                                <div class="text-label-caps text-on-surface-variant text-xs">Zodiac Sign</div>
                                                <div class="font-h3 text-on-surface" x-text="result.zodiac">Aries</div>
                                            </div>
                                        </div>
                                        <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm flex items-center gap-4">
                                            <div class="bg-primary-fixed p-3 rounded-full text-on-primary-fixed shrink-0">
                                                <span class="material-symbols-outlined block text-xl">calendar_today</span>
                                            </div>
                                            <div>
                                                <div class="text-label-caps text-on-surface-variant text-xs">Leap Years</div>
                                                <div class="font-h3 text-on-surface" x-text="result.leapYears + ' Lived'">0 Lived</div>
                                            </div>
                                        </div>
                                        <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm flex items-center gap-4">
                                            <div class="bg-primary-fixed p-3 rounded-full text-on-primary-fixed shrink-0">
                                                <span class="material-symbols-outlined block text-xl">event_upcoming</span>
                                            </div>
                                            <div>
                                                <div class="text-label-caps text-on-surface-variant text-xs">Half-Birthday</div>
                                                <div class="font-h3 text-on-surface" x-text="result.halfBirthday">Date</div>
                                            </div>
                                        </div>
                                        <!-- History -->
                                        <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm flex items-start gap-4 col-span-full">
                                            <div class="bg-secondary-fixed p-3 rounded-full text-on-secondary-fixed shrink-0">
                                                <span class="material-symbols-outlined block text-xl">history_edu</span>
                                            </div>
                                            <div>
                                                <div class="text-label-caps text-on-surface-variant text-xs">A Glimpse Into The Past</div>
                                                <div class="font-body-md text-on-surface italic leading-relaxed min-h-[3rem] transition-all duration-500"
                                                     :class="historyLoading ? 'opacity-50' : 'opacity-100'">
                                                    <template x-if="historyLoading">
                                                        <div class="flex items-center gap-2 text-secondary animate-pulse">
                                                            <span class="material-symbols-outlined text-sm">auto_awesome</span>
                                                            <span x-text="loadingQuote"></span>
                                                        </div>
                                                    </template>
                                                    <div x-show="!historyLoading" x-text="result.p1History" class="transition-all duration-300"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm flex items-center gap-4" x-show="mode === 'age'">
                                            <div class="bg-primary-fixed p-3 rounded-full text-on-primary-fixed shrink-0">
                                                <span class="material-symbols-outlined block text-xl">cake</span>
                                            </div>
                                            <div>
                                                <div class="text-label-caps text-on-surface-variant text-xs">Next Birthday</div>
                                                <div class="font-body-md text-on-surface font-bold" x-text="result.nextBirthdayCountdown"></div>
                                                <div class="text-xs text-on-surface-variant" x-text="'Falls on ' + result.nextBirthdayDay"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Profile 2 (Difference Mode Only) -->
                                <div class="space-y-4" x-show="mode === 'diff'">
                                    <div class="font-label-caps text-secondary font-bold border-b border-outline-variant pb-2" x-text="(p2Name || 'Person 2') + '\'s Profile'"></div>
                                    <div class="grid grid-cols-1 gap-4">
                                        <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm flex items-center gap-4">
                                            <div class="bg-primary-fixed p-3 rounded-full text-on-primary-fixed shrink-0">
                                                <span class="material-symbols-outlined block text-xl">event_repeat</span>
                                            </div>
                                            <div>
                                                <div class="text-label-caps text-on-surface-variant text-xs">Day of Birth</div>
                                                <div class="font-h3 text-on-surface" x-text="result.p2BirthDay">Friday</div>
                                            </div>
                                        </div>
                                        <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm flex items-center gap-4">
                                            <div class="bg-primary-fixed p-3 rounded-full text-on-primary-fixed shrink-0">
                                                <span class="material-symbols-outlined block text-xl">star_half</span>
                                            </div>
                                            <div>
                                                <div class="text-label-caps text-on-surface-variant text-xs">Zodiac Sign</div>
                                                <div class="font-h3 text-on-surface" x-text="result.p2Zodiac">Aries</div>
                                            </div>
                                        </div>
                                        <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm flex items-center gap-4">
                                            <div class="bg-primary-fixed p-3 rounded-full text-on-primary-fixed shrink-0">
                                                <span class="material-symbols-outlined block text-xl">calendar_today</span>
                                            </div>
                                            <div>
                                                <div class="text-label-caps text-on-surface-variant text-xs">Leap Years</div>
                                                <div class="font-h3 text-on-surface" x-text="result.p2LeapYears + ' Lived'">0 Lived</div>
                                            </div>
                                        </div>
                                        <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm flex items-center gap-4">
                                            <div class="bg-primary-fixed p-3 rounded-full text-on-primary-fixed shrink-0">
                                                <span class="material-symbols-outlined block text-xl">event_upcoming</span>
                                            </div>
                                            <div>
                                                <div class="text-label-caps text-on-surface-variant text-xs">Half-Birthday</div>
                                                <div class="font-h3 text-on-surface" x-text="result.p2HalfBirthday">Date</div>
                                            </div>
                                        </div>
                                        <!-- History P2 -->
                                        <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm flex items-start gap-4">
                                            <div class="bg-secondary-fixed p-3 rounded-full text-on-secondary-fixed shrink-0">
                                                <span class="material-symbols-outlined block text-xl">history_edu</span>
                                            </div>
                                            <div>
                                                <div class="text-label-caps text-on-surface-variant text-xs">A Glimpse Into The Past</div>
                                                <div class="font-body-md text-on-surface italic leading-relaxed min-h-[3rem] transition-all duration-500"
                                                     :class="historyLoading ? 'opacity-50' : 'opacity-100'">
                                                    <template x-if="historyLoading">
                                                        <div class="flex items-center gap-2 text-secondary animate-pulse">
                                                            <span class="material-symbols-outlined text-sm">auto_awesome</span>
                                                            <span x-text="loadingQuote"></span>
                                                        </div>
                                                    </template>
                                                    <div x-show="!historyLoading" x-text="result.p2History" class="transition-all duration-300"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB: Life Story -->
                    <div x-show="activeTab === 'story'" class="w-full text-left">
                        <!-- Person 1 Story -->
                        <div class="mb-8">
                            <h3 class="font-h3 text-on-surface mb-6 flex items-center gap-3">
                                <span class="p-2 bg-secondary/10 rounded-xl">
                                    <span class="material-symbols-outlined text-secondary block">auto_stories</span>
                                </span>
                                The Story of <span class="text-secondary ml-1" x-text="p1Name || 'Your Life'"></span>
                            </h3>

                            <!-- Life Battery -->
                            <div class="bg-surface-container-lowest p-5 rounded-lg border border-outline-variant shadow-sm mb-4">
                                <div class="flex justify-between items-end mb-3">
                                    <div>
                                        <div class="text-label-caps text-on-surface-variant text-xs">Life Progress</div>
                                        <div class="text-2xl font-black text-secondary" x-text="result.story.battery + '%'"></div>
                                    </div>
                                    <div class="text-on-surface-variant text-xs italic">Based on 80-year lifespan</div>
                                </div>
                                <div class="h-3 bg-surface-container-low border border-outline-variant rounded-full overflow-hidden mb-3">
                                    <div class="h-full bg-gradient-to-r from-secondary to-primary-fixed transition-all duration-1000"
                                         :style="`width: ${result.story.battery}%`"></div>
                                </div>
                                <p class="text-on-surface-variant font-body-md" x-text="storyText.battery"></p>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm flex items-start gap-4">
                                    <div class="bg-primary-fixed p-3 rounded-full text-on-primary-fixed shrink-0">
                                        <span class="material-symbols-outlined block text-xl">hourglass_empty</span>
                                    </div>
                                    <div>
                                        <div class="text-label-caps text-on-surface-variant text-xs">The 4,000 Weeks</div>
                                        <p class="text-on-surface-variant font-body-md mt-1" x-text="storyText.weeks"></p>
                                    </div>
                                </div>
                                <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm flex items-start gap-4">
                                    <div class="bg-error/10 p-3 rounded-full text-error shrink-0">
                                        <span class="material-symbols-outlined block text-xl">favorite</span>
                                    </div>
                                    <div>
                                        <div class="text-label-caps text-on-surface-variant text-xs">Biological Engine</div>
                                        <p class="text-on-surface-variant font-body-md mt-1" x-text="storyText.engine"></p>
                                    </div>
                                </div>
                                <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm flex items-start gap-4">
                                    <div class="bg-primary-fixed p-3 rounded-full text-on-primary-fixed shrink-0">
                                        <span class="material-symbols-outlined block text-xl">bedtime</span>
                                    </div>
                                    <div>
                                        <div class="text-label-caps text-on-surface-variant text-xs">Time Spent Sleeping</div>
                                        <p class="text-on-surface-variant font-body-md mt-1" x-text="storyText.sleep"></p>
                                    </div>
                                </div>
                                <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm flex items-start gap-4">
                                    <div class="bg-primary-fixed p-3 rounded-full text-on-primary-fixed shrink-0">
                                        <span class="material-symbols-outlined block text-xl">rocket_launch</span>
                                    </div>
                                    <div>
                                        <div class="text-label-caps text-on-surface-variant text-xs">Cosmic Journey</div>
                                        <p class="text-on-surface-variant font-body-md mt-1" x-text="storyText.cosmic"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Person 2 Story (Difference Mode) -->
                        <div x-show="mode === 'diff'" class="pt-8 border-t border-outline-variant">
                            <h3 class="font-h3 text-on-surface mb-6 flex items-center gap-3">
                                <span class="p-2 bg-secondary/10 rounded-xl">
                                    <span class="material-symbols-outlined text-secondary block">auto_stories</span>
                                </span>
                                The Story of <span class="text-secondary ml-1" x-text="p2Name || 'Person 2'"></span>
                            </h3>

                            <!-- Life Battery P2 -->
                            <div class="bg-surface-container-lowest p-5 rounded-lg border border-outline-variant shadow-sm mb-4">
                                <div class="flex justify-between items-end mb-3">
                                    <div>
                                        <div class="text-label-caps text-on-surface-variant text-xs">Life Progress</div>
                                        <div class="text-2xl font-black text-secondary" x-text="result.p2Story?.battery + '%'"></div>
                                    </div>
                                    <div class="text-on-surface-variant text-xs italic">Based on 80-year lifespan</div>
                                </div>
                                <div class="h-3 bg-surface-container-low border border-outline-variant rounded-full overflow-hidden mb-3">
                                    <div class="h-full bg-gradient-to-r from-secondary to-primary-fixed transition-all duration-1000"
                                         :style="`width: ${result.p2Story?.battery || 0}%`"></div>
                                </div>
                                <p class="text-on-surface-variant font-body-md" x-text="p2StoryText.battery"></p>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm flex items-start gap-4">
                                    <div class="bg-primary-fixed p-3 rounded-full text-on-primary-fixed shrink-0">
                                        <span class="material-symbols-outlined block text-xl">hourglass_empty</span>
                                    </div>
                                    <div>
                                        <div class="text-label-caps text-on-surface-variant text-xs">The 4,000 Weeks</div>
                                        <p class="text-on-surface-variant font-body-md mt-1" x-text="p2StoryText.weeks"></p>
                                    </div>
                                </div>
                                <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm flex items-start gap-4">
                                    <div class="bg-error/10 p-3 rounded-full text-error shrink-0">
                                        <span class="material-symbols-outlined block text-xl">favorite</span>
                                    </div>
                                    <div>
                                        <div class="text-label-caps text-on-surface-variant text-xs">Biological Engine</div>
                                        <p class="text-on-surface-variant font-body-md mt-1" x-text="p2StoryText.engine"></p>
                                    </div>
                                </div>
                                <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm flex items-start gap-4">
                                    <div class="bg-primary-fixed p-3 rounded-full text-on-primary-fixed shrink-0">
                                        <span class="material-symbols-outlined block text-xl">bedtime</span>
                                    </div>
                                    <div>
                                        <div class="text-label-caps text-on-surface-variant text-xs">Time Spent Sleeping</div>
                                        <p class="text-on-surface-variant font-body-md mt-1" x-text="p2StoryText.sleep"></p>
                                    </div>
                                </div>
                                <div class="bg-surface-container-lowest p-4 rounded-lg border border-outline-variant shadow-sm flex items-start gap-4">
                                    <div class="bg-primary-fixed p-3 rounded-full text-on-primary-fixed shrink-0">
                                        <span class="material-symbols-outlined block text-xl">rocket_launch</span>
                                    </div>
                                    <div>
                                        <div class="text-label-caps text-on-surface-variant text-xs">Cosmic Journey</div>
                                        <p class="text-on-surface-variant font-body-md mt-1" x-text="p2StoryText.cosmic"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SEO Article -->
            <article class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant p-6 sm:p-8">
                <h2 class="font-h2 text-on-surface mt-0 mb-stack-md">The Ultimate Guide to Age Calculation</h2>
                
                <section class="mb-stack-md">
                    <h3 class="font-h3 text-on-surface mb-3">Understanding Exact Age Calculation</h3>
                    <p class="text-on-surface-variant font-body-md mb-4">
                        Age calculation might seem straightforward at first glance, but it involves several mathematical complexities. Our <strong>Exact Age Calculator</strong> is designed to handle these nuances, providing you with a high-precision breakdown of your journey through time. But how exactly does it work, and why is this level of detail important?
                    </p>
                    <p class="text-on-surface-variant font-body-md mb-4">
                        The most common method used globally is the Western system, where a person's age increases on their birthday. However, calculating the time between two dates requires accounting for <strong>leap years</strong> (which add an extra day every four years) and the varying lengths of months (ranging from 28 to 31 days). Our tool uses a precise algorithm that calculates the difference between your date of birth and the target date, normalizing these variables to give you an accurate count of years, months, and days.
                    </p>
                </section>

                <section class="mb-stack-md">
                    <h3 class="font-h3 text-on-surface mb-3">How Our Age Calculator Works</h3>
                    <p class="text-on-surface-variant font-body-md mb-4">
                        When you enter your birth date, our system first determines the total number of days lived. From there, it works backward to extract the years, then the remaining months, and finally the days. Unlike simple subtraction, which might lead to errors in leap years, our system verifies each month's boundary.
                    </p>
                    <p class="text-on-surface-variant font-body-md">
                        For example, if you were born on February 29th during a leap year, the calculator understands that in non-leap years, your "legal" birthday may fall on March 1st or February 28th, depending on your local jurisdiction. We provide the raw data so you can see exactly where you stand in the chronological timeline.
                    </p>
                </section>

                <section class="mb-stack-md">
                    <h3 class="font-h3 text-on-surface mb-3">Legal and Cultural Significance of Age</h3>
                    <p class="text-on-surface-variant font-body-md mb-4">
                        Age is more than just a number; it is a critical legal marker. Around the world, reaching certain "milestone ages" grants individuals specific rights and responsibilities.
                    </p>
                    <ul class="list-disc pl-5 text-on-surface-variant font-body-md space-y-3 mb-4">
                        <li><strong>Age of Majority:</strong> In most countries, this is 18 years old, the point at which a person is legally considered an adult, capable of voting, signing contracts, and making independent decisions.</li>
                        <li><strong>Retirement Eligibility:</strong> Pension systems and social security benefits are strictly tied to reaching a specific age, often between 60 and 67.</li>
                        <li><strong>Driving Privileges:</strong> Most jurisdictions require a minimum age of 16 or 17 to obtain a learner's permit or driver's license.</li>
                        <li><strong>Educational Milestones:</strong> School enrollment and graduation requirements often depend on being a certain age by a specific cutoff date.</li>
                    </ul>
                    <p class="text-on-surface-variant font-body-md">
                        Cultural differences also exist. In some East Asian cultures, a person is considered one year old at birth (the "Korean Age" system), and their age increases on New Year's Day rather than their actual birthday. While our tool uses the international standard, understanding your exact chronological age is vital for global communication and documentation.
                    </p>
                </section>

                <section class="mb-stack-md">
                    <h3 class="font-h3 text-on-surface mb-3">Beyond Years: The "Life Story" Statistics</h3>
                    <p class="text-on-surface-variant font-body-md mb-4">
                        We wanted to go beyond just numbers. Our "Life Story" tab translates your age into biological and cosmic terms. Did you know that by age 30, your heart has beaten over 1.1 billion times? Or that you've traveled billions of miles through space as the Earth orbits the Sun?
                    </p>
                    <p class="text-on-surface-variant font-body-md">
                        These statistics serve as a reminder of the incredible biological machine that is the human body and our place in the universe. By visualizing your "Life Battery" (based on an average 80-year lifespan), we hope to provide a perspective that encourages you to make the most of your time.
                    </p>
                </section>

                <section class="mb-stack-md">
                    <h3 class="font-h3 text-on-surface mb-3">Frequently Asked Questions</h3>
                    <div class="space-y-4">
                        <details class="group border border-outline-variant rounded-lg">
                            <summary class="flex items-center justify-between cursor-pointer p-4 font-medium text-on-surface">
                                How accurate is this age calculator?
                                <span class="material-symbols-outlined text-secondary transition-transform group-open:rotate-180">expand_more</span>
                            </summary>
                            <p class="px-4 pb-4 text-on-surface-variant font-body-md">Our calculator accounts for leap years, varying month lengths, and provides real-time precision down to the second. It is one of the most accurate age calculators available online, utilizing modern JavaScript date objects and high-precision math.</p>
                        </details>
                        <details class="group border border-outline-variant rounded-lg">
                            <summary class="flex items-center justify-between cursor-pointer p-4 font-medium text-on-surface">
                                Can I calculate the age difference between two people?
                                <span class="material-symbols-outlined text-secondary transition-transform group-open:rotate-180">expand_more</span>
                            </summary>
                            <p class="px-4 pb-4 text-on-surface-variant font-body-md">Yes! Switch to "Age Difference" mode using the toggle at the top of the calculator. This is perfect for comparing siblings, friends, or even historical figures to see exactly how much older one is than the other.</p>
                        </details>
                        <details class="group border border-outline-variant rounded-lg">
                            <summary class="flex items-center justify-between cursor-pointer p-4 font-medium text-on-surface">
                                What is the 4,000 weeks concept?
                                <span class="material-symbols-outlined text-secondary transition-transform group-open:rotate-180">expand_more</span>
                            </summary>
                            <p class="px-4 pb-4 text-on-surface-variant font-body-md">The 4,000 weeks concept, popularized by Oliver Burkeman, suggests that a typical human life lasts about 4,000 weeks. We use this as a benchmark in our "Life Story" tab to show you how many weeks you've lived and how many remain, emphasizing the value of time management.</p>
                        </details>
                        <details class="group border border-outline-variant rounded-lg">
                            <summary class="flex items-center justify-between cursor-pointer p-4 font-medium text-on-surface">
                                Why is my zodiac sign different on other sites?
                                <span class="material-symbols-outlined text-secondary transition-transform group-open:rotate-180">expand_more</span>
                            </summary>
                            <p class="px-4 pb-4 text-on-surface-variant font-body-md">We use the tropical zodiac dates, which are the most common in Western astrology. However, some systems use sidereal dates or have different cut-offs for "cusp" birthdays. We provide the most widely accepted standard sign.</p>
                        </details>
                    </div>
                </section>
            </article>

            <!-- Structured Data (JSON-LD) -->
            <script type="application/ld+json">
            {
              "{{ '@' }}context": "https://schema.org",
              "{{ '@' }}type": "FAQPage",
              "mainEntity": [{
                "{{ '@' }}type": "Question",
                "name": "How accurate is this age calculator?",
                "acceptedAnswer": {
                  "{{ '@' }}type": "Answer",
                  "text": "Our calculator accounts for leap years and varying month lengths to provide precision down to the second."
                }
              }, {
                "{{ '@' }}type": "Question",
                "name": "Can I calculate the age difference between two people?",
                "acceptedAnswer": {
                  "{{ '@' }}type": "Answer",
                  "text": "Yes, our Age Difference mode allows for exact comparisons between any two dates of birth."
                }
              }]
            }
            </script>
            <!-- Bottom Ad Placeholder -->
            <div class="adsense-slot mx-auto my-base" style="display:none;">
                <!-- AdSense Slot (Bottom) -->
            </div>
        </div>

        <!-- Right Column (1/3) -->
        <div class="lg:w-1/3 flex flex-col gap-stack-lg order-1 lg:order-2">
            
            <!-- Sidebar Ad Placeholder -->
            <div class="adsense-slot mx-auto my-base" style="display:none;">
                <!-- AdSense Slot (Sidebar) -->
            </div>
            <div class="sticky top-24 flex flex-col gap-stack-lg">
                <div class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant p-6">
                    <h3 class="font-h3 text-on-surface mb-4 pb-2 border-b border-outline-variant">Navigation</h3>
                    <ul class="space-y-3">
                        <li><a class="text-on-surface-variant hover:text-secondary hover:underline transition-all" href="{{ route('home') }}">Home</a></li>
                        <li><a class="text-on-surface-variant hover:text-secondary hover:underline transition-all" href="{{ route('about') }}">About Us</a></li>
                        <li><a class="text-on-surface-variant hover:text-secondary hover:underline transition-all" href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function ageCalculator() {
        return {
            mode: 'age', // 'age' or 'diff'
            p1Name: '',
            p2Name: '',
            dob: '',
            targetDate: '{{ date('Y-m-d') }}',
            showResults: false,
            showStory: false,
            activeTab: 'results',
            result: {
                years: 0,
                months: 0,
                days: 0,
                hours: 0,
                minutes: 0,
                seconds: 0,
                totalMonths: 0,
                totalWeeks: 0,
                totalDays: 0,
                totalHours: 0,
                totalMinutes: 0,
                totalSeconds: 0,
                birthDay: '',
                nextBirthdayCountdown: '',
                nextBirthdayDay: '',
                halfBirthday: '',
                p2HalfBirthday: '',
                p1History: 'Loading...',
                p2History: 'Loading...',
                zodiac: '',
                p2Zodiac: '',
                leapYears: 0,
                comparisonText: '',
                p1AgeSummary: '',
                p2AgeSummary: '',
                p2BirthDay: '',
                p2LeapYears: 0,
                story: {
                    battery: 0,
                    weeksLived: 0,
                    weeksLeft: 0,
                    heartbeats: 0,
                    breaths: 0,
                    yearsSleeping: 0,
                    cosmicMiles: 0
                }
            },
            summaryText: '',
            timer: null,
            historyLoading: false,
            loadingQuote: '',
            historyQuotes: [
                "Unlocking the vaults of time...",
                "Consulting the scrolls of the past...",
                "Journeying through the corridors of history...",
                "Dusting off the pages of antiquity...",
                "Whispers of history are being gathered...",
                "Retrieving forgotten moments from the archives..."
            ],
            
            resetData() {
                this.showResults = false;
                this.p1Name = '';
                this.p2Name = '';
                this.dob = '';
                this.targetDate = this.mode === 'age' ? '{{ date('Y-m-d') }}' : '';
                this.result = {
                    years: 0, months: 0, days: 0, hours: 0, minutes: 0, seconds: 0,
                    totalMonths: 0, totalWeeks: 0, totalDays: 0, totalHours: 0, totalMinutes: 0, totalSeconds: 0,
                    birthDay: '', nextBirthdayCountdown: '', nextBirthdayDay: '', halfBirthday: '', p2HalfBirthday: '',
                    p1History: '', p2History: '', zodiac: '', p2Zodiac: '', leapYears: 0,
                    comparisonText: '', p1AgeSummary: '', p2AgeSummary: '', p2BirthDay: '', p2LeapYears: 0,
                    story: {
                        battery: 0, weeksLived: 0, weeksLeft: 0, heartbeats: 0, breaths: 0,
                        yearsSleeping: 0, cosmicMiles: 0
                    },
                    p2Story: {
                        battery: 0, weeksLived: 0, weeksLeft: 0, heartbeats: 0, breaths: 0,
                        yearsSleeping: 0, cosmicMiles: 0
                    }
                };
                this.storyText = { battery: '', weeks: '', engine: '', sleep: '', cosmic: '' };
                this.p2StoryText = { battery: '', weeks: '', engine: '', sleep: '', cosmic: '' };
                if (this.timer) clearInterval(this.timer);
            },
            storyText: {
                battery: '',
                weeks: '',
                engine: '',
                sleep: '',
                cosmic: ''
            },
            p2StoryText: {
                battery: '',
                weeks: '',
                engine: '',
                sleep: '',
                cosmic: ''
            },
            narratives: {
                battery: [
                    "Your life battery is at {val}%. The best chapters are yet to be written.",
                    "At {val}%, you've gathered enough energy to power a small city of memories.",
                    "You've successfully charged {val}% of your existence. What's next?",
                    "Your soul's battery is at {val}%. Use the remaining power for things that set you on fire.",
                    "At {val}% capacity, you've already experienced more than most explorers in history.",
                    "Your internal clock shows {val}% progress. Every percent is a collection of triumphs.",
                    "The battery of your life is at {val}%. Don't just count the percent, make the percent count.",
                    "You've used {val}% of your available time. It’s been an incredible journey so far.",
                    "With {val}% of your battery used, you are now entering your high-performance era.",
                    "Your life progress stands at {val}%. The architecture of your future is still in your hands.",
                    "At {val}%, you are a seasoned traveler in the landscape of time.",
                    "Your battery reads {val}%. Think of all the beautiful moments that powered this charge.",
                    "You are {val}% through your primary mission on Earth. Keep the signal strong.",
                    "At {val}%, you have mastered {val}% of the human experience.",
                    "Your life energy is {val}% integrated. You are becoming who you were meant to be.",
                    "The gauge shows {val}%. Plenty of juice left for a spectacular finale.",
                    "At {val}% charge, your wisdom is beginning to outshine your youth.",
                    "You've sailed through {val}% of your life's ocean. New continents await.",
                    "Your battery is {val}% full of stories. Let's make the rest legendary.",
                    "At {val}%, you are perfectly positioned for your next big breakthrough.",
                    "Your life meter is at {val}%. This is the sweet spot of existence.",
                    "You've filled {val}% of your life's canvas. The colors are getting richer.",
                    "At {val}%, your life battery is seasoned, resilient, and ready for more.",
                    "You've crossed the {val}% mark. The view from here is spectacular.",
                    "Your life battery is at {val}%. May the next 1% be your happiest yet."
                ],
                weeks: [
                    "You have roughly {val} weekends left. Make each one a masterpiece.",
                    "You've lived {lived} weeks. You have {val} more to find what truly matters.",
                    "In the perspective of 4,000 weeks, you have {val} left to explore the unknown.",
                    "Your bank account of time has {val} weeks remaining. Spend them on joy.",
                    "You've spent {lived} weeks on this planet. {val} more are waiting for your touch.",
                    "There are {val} weeks between you and the century mark. Start the adventure.",
                    "Time is a finite currency. You have {val} weeks left to buy your dreams.",
                    "You have lived through {lived} Mondays. You have {val} more opportunities for a fresh start.",
                    "The clock of 4,000 weeks is ticking. You have {val} left to leave your legacy.",
                    "You've experienced {lived} weeks of growth. {val} more weeks of wisdom await.",
                    "Your story has {val} weeks of unwritten pages left. Pick up the pen.",
                    "You have {val} weeks left to see the world, love deeply, and laugh often.",
                    "Out of the famous 4,000 weeks, you have {val} precious ones remaining.",
                    "You've completed {lived} weekly cycles. {val} more chances to get it right.",
                    "Your life span has {val} weeks of potential left. Don't waste a single heartbeat.",
                    "You have {val} weeks to become the person you always dreamed of being.",
                    "The journey of {lived} weeks has brought you here. {val} weeks will take you further.",
                    "You have {val} weeks of sunsets left to witness. Don't miss the next one.",
                    "Time is the ultimate luxury. You have {val} weeks left in your vault.",
                    "You've conquered {lived} weeks of challenges. {val} weeks of victory are coming.",
                    "There are {val} weeks left to tell your story. Make it a bestseller.",
                    "You have {val} weeks to travel, {val} weeks to love, and {val} weeks to be free.",
                    "Your life is a miracle of {lived} weeks and counting. {val} more to go.",
                    "You have {val} weeks left to make a difference in someone's life.",
                    "Every week is a gift. You have {val} more to unwrap."
                ],
                engine: [
                    "Your heart has beaten {val} times. You are a walking miracle of resilience.",
                    "You've taken {breaths} breaths. Each one was a silent gift from the universe.",
                    "Your biological engine has pulsed {val} times without ever taking a break.",
                    "You've inhaled the world {breaths} times. You are deeply connected to the Earth.",
                    "Your heart has rhythmically fired {val} times, keeping your dreams alive.",
                    "With {breaths} breaths taken, your lungs have processed a small forest's worth of air.",
                    "Your blood has traveled thousands of miles while your heart beat {val} times.",
                    "You are a biological masterpiece, sustained by {val} steady heartbeats.",
                    "Your life force is measured in {breaths} breaths. Each one a quiet victory.",
                    "Your heart has worked for you {val} times today and every day before.",
                    "You have processed {breaths} moments of oxygen. You are life in motion.",
                    "Your internal engine has never stalled in {val} beats. Trust its strength.",
                    "You've survived {breaths} cycles of air. You are stronger than you think.",
                    "Your heart is a tireless drummer, beating {val} times for your life's song.",
                    "With {breaths} breaths, you've powered {val} heartbeats of passion.",
                    "Your biology has managed {val} beats. It knows exactly how to keep you going.",
                    "You've breathed in the future {breaths} times. Keep looking forward.",
                    "Your heart has carried you through everything with {val} steady beats.",
                    "You are a rhythm of {val} heartbeats and {breaths} quiet sighs.",
                    "Your engine is fine-tuned after {val} beats of experience.",
                    "You've taken {breaths} chances with every breath. Keep taking them.",
                    "Your heart has echoed through the world {val} times already.",
                    "With {breaths} breaths, you've survived {val} moments of pure life.",
                    "Your biological clock has ticked {val} times in your chest.",
                    "You are the result of {val} heartbeats and infinite possibilities."
                ],
                sleep: [
                    "You've spent {val} years in the world of dreams. Rest is your superpower.",
                    "Out of your life, {val} years were dedicated to the healing art of sleep.",
                    "You've spent {val} years recharging your soul in the quiet of the night.",
                    "The dreamland has been your home for {val} years. What secrets did you find?",
                    "Rest has claimed {val} years of your journey, preparing you for every waking moment.",
                    "You've spent {val} years horizontal, letting your body rebuild its magic.",
                    "Sleep has been your silent companion for {val} years of your existence.",
                    "You've traveled through the subconscious for {val} years. A true dream explorer.",
                    "Your life has been balanced by {val} years of deep, restorative slumber.",
                    "You've spent {val} years under the stars, even when you couldn't see them.",
                    "Nearly {val} years of your life were spent in the sanctuary of sleep.",
                    "You've dedicated {val} years to the essential work of doing absolutely nothing.",
                    "Dreaming has occupied {val} years of your time. You are a dreamer by nature.",
                    "You've spent {val} years in the quiet dark, finding the strength for the light.",
                    "Sleep has reclaimed {val} years of your time to give you a lifetime of energy.",
                    "You've spent {val} years letting go of the world to find yourself in dreams.",
                    "Your body has rested for {val} years to carry you through the other two-thirds.",
                    "You've spent {val} years in the most peaceful state known to man.",
                    "Dreaming is a full-time job you've done for {val} years straight.",
                    "You've spent {val} years in the embrace of Morpheus, the god of dreams.",
                    "Rest is not wasted time; you've invested {val} years in your longevity.",
                    "You've spent {val} years in the realm of the unconscious, growing in silence.",
                    "Your life's foundation was built on {val} years of solid, uninterrupted sleep.",
                    "You've spent {val} years in the night, becoming the person you are in the day.",
                    "Nearly a third of your life—{val} years—was spent in the beautiful void of sleep."
                ],
                cosmic: [
                    "You've traveled {val} miles through the galaxy without ever leaving your seat.",
                    "The Earth has carried you {val} miles on its eternal dance around the Sun.",
                    "You are a celestial voyager, having covered {val} miles in the cosmic ocean.",
                    "Your cosmic odometer reads {val} miles. You've seen more of space than you realize.",
                    "In the grand orbit of life, you've glided through {val} miles of star-dusted space.",
                    "You've crossed {val} miles of the solar system. A true citizen of the universe.",
                    "Your journey through the void has already spanned {val} miles. Keep soaring.",
                    "You are a passenger on a planet that has moved you {val} miles since birth.",
                    "The cosmic winds have carried you through {val} miles of galactic history.",
                    "You've orbited the sun {years} times, covering a staggering {val} miles.",
                    "Your total distance through the vacuum of space is {val} miles and counting.",
                    "You've traveled {val} miles on a blue dot floating in the infinite dark.",
                    "The sun has pulled you {val} miles through the Milky Way since your first cry.",
                    "You are a space traveler who has already logged {val} miles in the logbook of time.",
                    "Your cosmic path has spanned {val} miles. You are exactly where you need to be.",
                    "You've drifted through {val} miles of starlight and planetary shadows.",
                    "Your existence is a {val} mile journey through the fabric of space-time.",
                    "You've covered {val} miles on a ship called Earth. Enjoy the view.",
                    "The galaxy has seen you pass through {val} miles of its territory.",
                    "You've moved {val} miles toward your destiny in the grand cosmic design.",
                    "Your space-time coordinates have shifted by {val} miles since you were born.",
                    "You are {val} miles deeper into the universe than you were on day one.",
                    "The Earth has spun you through {val} miles of cosmic wonder.",
                    "You've navigated {val} miles of the cosmic sea. Steady as she goes.",
                    "Your journey of {val} miles through space is the greatest adventure of all."
                ]
            },

            calculate() {
                if (!this.dob || !this.targetDate) {
                    alert("Please provide both dates.");
                    return;
                }

                this.showResults = true;
                this.fetchHistory(this.dob, 1);
                if (this.mode === 'diff') this.fetchHistory(this.targetDate, 2);
                
                this.updateCalculation();
                this.generateStory();

                // Keep timer running for real-time updates
                if (this.timer) clearInterval(this.timer);
                this.timer = setInterval(() => {
                    this.updateCalculation();
                }, 1000);
            },

            async fetchHistory(date, person) {
                if (!date) return;
                
                this.historyLoading = true;
                this.loadingQuote = this.historyQuotes[Math.floor(Math.random() * this.historyQuotes.length)];
                
                if (person === 1) this.result.p1History = '';
                else this.result.p2History = '';
                
                // 2 second dramatic delay
                await new Promise(resolve => setTimeout(resolve, 2000));
                
                const d = new Date(date);
                const month = d.getMonth() + 1;
                const day = d.getDate();
                try {
                    const response = await fetch(`/api/history/${month}/${day}`);
                    const data = await response.json();
                    
                    this.historyLoading = false;
                    this.typeText(person === 1 ? 'p1History' : 'p2History', data.text);
                } catch (e) {
                    this.historyLoading = false;
                    const fallback = "On this day, something remarkable happened in history!";
                    this.typeText(person === 1 ? 'p1History' : 'p2History', fallback);
                }
            },

            typeText(target, text) {
                let i = 0;
                this.result[target] = '';
                const interval = setInterval(() => {
                    this.result[target] += text.charAt(i);
                    i++;
                    if (i >= text.length) clearInterval(interval);
                }, 20);
            },

            // Helper to count leap years between two dates
            countLeapYears(start, end) {
                let count = 0;
                const startYear = start.getFullYear();
                const endYear = end.getFullYear();
                for (let y = startYear; y <= endYear; y++) {
                    if ((y % 4 === 0 && y % 100 !== 0) || (y % 400 === 0)) {
                        // Check if the leap day actually happened in the range
                        const leapDay = new Date(y, 1, 29);
                        if (leapDay >= start && leapDay <= end) {
                            count++;
                        }
                    }
                }
                return count;
            },

            // Helper to get Y-M-D-H-M-S breakdown between two dates
            getDiff(d1, d2) {
                let start = d1 < d2 ? d1 : d2;
                let end = d1 < d2 ? d2 : d1;

                let years = end.getFullYear() - start.getFullYear();
                let months = end.getMonth() - start.getMonth();
                let days = end.getDate() - start.getDate();

                if (days < 0) {
                    months--;
                    const prevMonth = new Date(end.getFullYear(), end.getMonth(), 0);
                    days += prevMonth.getDate();
                }
                if (months < 0) {
                    years--;
                    months += 12;
                }

                const diffMs = end - start;
                const totalSeconds = Math.floor(diffMs / 1000);
                const totalMinutes = Math.floor(totalSeconds / 60);
                const totalHours = Math.floor(totalMinutes / 60);
                const totalDays = Math.floor(totalHours / 24);
                const totalWeeks = Math.floor(totalDays / 7);

                return {
                    years, months, days,
                    hours: end.getHours() - start.getHours() < 0 ? 24 + (end.getHours() - start.getHours()) : end.getHours() - start.getHours(),
                    minutes: end.getMinutes() - start.getMinutes() < 0 ? 60 + (end.getMinutes() - start.getMinutes()) : end.getMinutes() - start.getMinutes(),
                    seconds: end.getSeconds() - start.getSeconds() < 0 ? 60 + (end.getSeconds() - start.getSeconds()) : end.getSeconds() - start.getSeconds(),
                    totalMonths: (years * 12) + months,
                    totalWeeks, totalDays, totalHours, totalMinutes, totalSeconds
                };
            },

            updateCalculation() {
                const now = new Date();
                const d1 = new Date(this.dob + 'T00:00:00');
                const d2 = this.mode === 'age' ? new Date(this.targetDate + (this.targetDate === now.toISOString().split('T')[0] ? 'T' + now.toTimeString().split(' ')[0] : 'T23:59:59')) : new Date(this.targetDate + 'T00:00:00');

                if (this.mode === 'age') {
                    const diff = this.getDiff(d1, d2);
                    const birthDay = d1.toLocaleDateString('en-US', { weekday: 'long' });
                    const leapYears = this.countLeapYears(d1, d2);
                    
                    // Next Birthday
                    let nextBday = new Date(now.getFullYear(), d1.getMonth(), d1.getDate());
                    if (nextBday < now) nextBday.setFullYear(now.getFullYear() + 1);
                    const nextBirthdayDay = nextBday.toLocaleDateString('en-US', { weekday: 'long' });
                    const nbDiff = this.getDiff(now, nextBday);
                    let nextBirthdayCountdown = `${nbDiff.months} months and ${nbDiff.days} days left`;
                    if (nbDiff.totalDays === 0) nextBirthdayCountdown = "Today is your Birthday! 🎉";

                    let halfBday = new Date(d1);
                    halfBday.setMonth(halfBday.getMonth() + 6);

                    this.result = {
                        ...this.result,
                        ...diff,
                        birthDay,
                        leapYears,
                        nextBirthdayCountdown,
                        nextBirthdayDay,
                        halfBirthday: halfBday.toLocaleDateString('en-US', { month: 'long', day: 'numeric' }),
                        zodiac: this.getZodiac(d1.getDate(), d1.getMonth()),
                        story: {
                            battery: ((diff.totalDays / (80 * 365.25)) * 100).toFixed(1),
                            weeksLived: Math.floor(diff.totalWeeks).toLocaleString(),
                            weeksLeft: Math.max(0, Math.floor((80 * 52.17) - diff.totalWeeks)).toLocaleString(),
                            heartbeats: (diff.totalMinutes * 80).toLocaleString(),
                            breaths: (diff.totalMinutes * 16).toLocaleString(),
                            yearsSleeping: (diff.years * 0.33).toFixed(1),
                            cosmicMiles: (diff.years * 584000000).toLocaleString()
                        }
                    };
                    this.summaryText = `${diff.years} years, ${diff.months} months, ${diff.days} days, ${diff.hours} hours, ${diff.minutes} minutes, and ${diff.seconds} seconds`;
                } else {
                    // Difference Mode
                    const diff = this.getDiff(d1, d2);
                    const age1 = this.getDiff(d1, now);
                    const age2 = this.getDiff(d2, now);

                    const name1 = this.p1Name || 'Person 1';
                    const name2 = this.p2Name || 'Person 2';

                    let halfBday1 = new Date(d1);
                    halfBday1.setMonth(halfBday1.getMonth() + 6);
                    let halfBday2 = new Date(d2);
                    halfBday2.setMonth(halfBday2.getMonth() + 6);

                    this.result = {
                        ...this.result,
                        ...diff,
                        comparisonText: d1 < d2 ? `${name1} is older than ${name2}` : (d1 > d2 ? `${name2} is older than ${name1}` : "Both are the same age"),
                        p1AgeSummary: `${age1.years}y ${age1.months}m ${age1.days}d`,
                        p2AgeSummary: `${age2.years}y ${age2.months}m ${age2.days}d`,
                        birthDay: d1.toLocaleDateString('en-US', { weekday: 'long' }),
                        p2BirthDay: d2.toLocaleDateString('en-US', { weekday: 'long' }),
                        leapYears: this.countLeapYears(d1, now),
                        p2LeapYears: this.countLeapYears(d2, now),
                        halfBirthday: halfBday1.toLocaleDateString('en-US', { month: 'long', day: 'numeric' }),
                        p2HalfBirthday: halfBday2.toLocaleDateString('en-US', { month: 'long', day: 'numeric' }),
                        zodiac: this.getZodiac(d1.getDate(), d1.getMonth()),
                        p2Zodiac: this.getZodiac(d2.getDate(), d2.getMonth()),
                        story: {
                            battery: ((age1.totalDays / (80 * 365.25)) * 100).toFixed(1),
                            weeksLived: Math.floor(age1.totalWeeks).toLocaleString(),
                            weeksLeft: Math.max(0, Math.floor((80 * 52.17) - age1.totalWeeks)).toLocaleString(),
                            heartbeats: (age1.totalMinutes * 80).toLocaleString(),
                            breaths: (age1.totalMinutes * 16).toLocaleString(),
                            yearsSleeping: (age1.years * 0.33).toFixed(1),
                            cosmicMiles: (age1.years * 584000000).toLocaleString()
                        },
                        p2Story: {
                            battery: ((age2.totalDays / (80 * 365.25)) * 100).toFixed(1),
                            weeksLived: Math.floor(age2.totalWeeks).toLocaleString(),
                            weeksLeft: Math.max(0, Math.floor((80 * 52.17) - age2.totalWeeks)).toLocaleString(),
                            heartbeats: (age2.totalMinutes * 80).toLocaleString(),
                            breaths: (age2.totalMinutes * 16).toLocaleString(),
                            yearsSleeping: (age2.years * 0.33).toFixed(1),
                            cosmicMiles: (age2.years * 584000000).toLocaleString()
                        }
                    };
                    this.summaryText = `${diff.years} years, ${diff.months} months, ${diff.days} days, ${diff.hours} hours, ${diff.minutes} minutes, and ${diff.seconds} seconds`;
                }
            },

            getStoryNarrative(type, values) {
                const list = this.narratives[type];
                const template = list[Math.floor(Math.random() * list.length)];
                let hydrated = template;
                for (const [key, val] of Object.entries(values)) {
                    hydrated = hydrated.replace(new RegExp(`{${key}}`, 'g'), val);
                }
                return hydrated;
            },

            generateStory() {
                const story = this.result.story;
                const years = this.result.years;
                
                this.storyText.battery = this.getStoryNarrative('battery', { val: story.battery });
                this.storyText.weeks = this.getStoryNarrative('weeks', { val: story.weeksLeft, lived: story.weeksLived });
                this.storyText.engine = this.getStoryNarrative('engine', { val: story.heartbeats, breaths: story.breaths });
                this.storyText.sleep = this.getStoryNarrative('sleep', { val: story.yearsSleeping });
                this.storyText.cosmic = this.getStoryNarrative('cosmic', { val: story.cosmicMiles, years: years });

                // Person 2 story (Difference Mode)
                if (this.mode === 'diff' && this.result.p2Story) {
                    const p2 = this.result.p2Story;
                    this.p2StoryText.battery = this.getStoryNarrative('battery', { val: p2.battery });
                    this.p2StoryText.weeks = this.getStoryNarrative('weeks', { val: p2.weeksLeft, lived: p2.weeksLived });
                    this.p2StoryText.engine = this.getStoryNarrative('engine', { val: p2.heartbeats, breaths: p2.breaths });
                    this.p2StoryText.sleep = this.getStoryNarrative('sleep', { val: p2.yearsSleeping });
                    this.p2StoryText.cosmic = this.getStoryNarrative('cosmic', { val: p2.cosmicMiles, years: this.result.p2AgeSummary?.split('y')[0] || 0 });
                }
            },

            getZodiac(day, month) {
                const signs = ["Capricorn", "Aquarius", "Pisces", "Aries", "Taurus", "Gemini", "Cancer", "Leo", "Virgo", "Libra", "Scorpio", "Sagittarius"];
                const last_day = [19, 18, 20, 19, 20, 20, 22, 22, 22, 22, 21, 21];
                return (day > last_day[month]) ? signs[(month + 1) % 12] : signs[month];
            },

            init() {
                // Initialize
            }
        }
    }
</script>
<style>
    [x-cloak] { display: none !important; }
</style>
@endpush

@extends('layouts.app')

@section('title', 'Advanced Time Duration Calculator — Calculate Time Between Dates')
@section('meta_description', 'Professional time duration calculator. Calculate date difference, exact age, add/subtract time, working days, and live event countdowns.')

@section('content')
<div class="flex flex-col lg:flex-row gap-gutter" x-data="timeCalculator()" x-init="init()">
    <!-- Left Column (2/3) -->
    <div class="lg:w-2/3 flex flex-col gap-stack-lg order-2 lg:order-1">
        
        <!-- Tool Interface -->
        <section class="relative overflow-hidden bg-surface-container-lowest rounded-3xl shadow-card border border-outline-variant/40 p-6 sm:p-10" data-reveal="fade-up">
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-secondary via-primary-fixed to-secondary"></div>

            <div class="mb-8">
                <h1 class="font-h1 text-on-surface mb-2">Advanced Time Calculator</h1>
                <p class="text-on-surface-variant font-body-md">A comprehensive suite for all your date and time calculation needs.</p>
            </div>

            <!-- Tabs Navigation -->
            <div class="flex bg-surface-container-low p-1.5 rounded-2xl border border-outline-variant/40 mb-8 overflow-x-auto no-scrollbar">
                <template x-for="tab in tabs" :key="tab.id">
                    <button @click="activeTab = tab.id; showResults = false;" 
                            :class="activeTab === tab.id ? 'bg-secondary text-on-secondary shadow-md' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface'"
                            class="flex-1 min-w-0 px-4 py-2.5 rounded-xl font-label-caps transition-all duration-300 flex items-center justify-center gap-2 whitespace-nowrap cursor-pointer">
                        <span class="material-symbols-outlined text-base" x-text="tab.icon"></span>
                        <span x-text="tab.label"></span>
                    </button>
                </template>
            </div>

            <!-- Tab Content: Date Difference -->
            <div x-show="activeTab === 'diff'" class="space-y-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="group">
                        <label class="block font-label-caps text-on-surface mb-2.5 uppercase tracking-wider text-xs cursor-pointer">Start Date</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface-variant/50 text-lg">calendar_today</span>
                            <input x-model="diff.start" type="datetime-local" class="w-full rounded-xl border-outline-variant/50 focus:border-secondary focus:ring-2 focus:ring-secondary/20 h-13 pl-11 pr-4 text-on-surface bg-surface-container-low font-body-md border transition-all duration-200 cursor-pointer">
                        </div>
                    </div>
                    <div class="group">
                        <label class="block font-label-caps text-on-surface mb-2.5 uppercase tracking-wider text-xs cursor-pointer">End Date</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface-variant/50 text-lg">event</span>
                            <input x-model="diff.end" type="datetime-local" class="w-full rounded-xl border-outline-variant/50 focus:border-secondary focus:ring-2 focus:ring-secondary/20 h-13 pl-11 pr-4 text-on-surface bg-surface-container-low font-body-md border transition-all duration-200 cursor-pointer">
                        </div>
                    </div>
                </div>
                <button @click="calculateDiff()" class="group bg-secondary hover:bg-secondary-container text-on-secondary font-semibold py-3.5 px-10 rounded-xl transition-all duration-300 shadow-md hover:shadow-glow flex items-center gap-2.5 cursor-pointer">
                    <span class="material-symbols-outlined transition-transform duration-300 group-hover:rotate-12">calculate</span>
                    Calculate Difference
                </button>
            </div>



            <!-- Tab Content: Add/Subtract -->
            <div x-show="activeTab === 'offset'" class="space-y-8" x-cloak>
                <div class="grid grid-cols-1 gap-6">
                    <div class="group">
                        <label class="block font-label-caps text-on-surface mb-2.5 uppercase tracking-wider text-xs">Base Date & Time</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface-variant/50 text-lg">schedule</span>
                            <input x-model="offset.base" type="datetime-local" class="w-full rounded-xl border-outline-variant/50 focus:border-secondary focus:ring-2 focus:ring-secondary/20 h-13 pl-11 pr-4 text-on-surface bg-surface-container-low font-body-md border transition-all duration-200 cursor-pointer">
                        </div>
                    </div>
                    <div class="flex items-center gap-4 bg-surface-container-low p-4 rounded-2xl border border-outline-variant/30">
                        <span class="text-sm font-semibold text-on-surface">Operation:</span>
                        <button @click="offset.op = 'add'" :class="offset.op === 'add' ? 'bg-secondary text-on-secondary shadow-sm' : 'bg-surface-container-high text-on-surface-variant'" class="px-4 py-1.5 rounded-lg text-xs font-bold transition-all">ADD</button>
                        <button @click="offset.op = 'sub'" :class="offset.op === 'sub' ? 'bg-secondary text-on-secondary shadow-sm' : 'bg-surface-container-high text-on-surface-variant'" class="px-4 py-1.5 rounded-lg text-xs font-bold transition-all">SUBTRACT</button>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                        <template x-for="unit in ['Years', 'Months', 'Days', 'Hours', 'Minutes']" :key="unit">
                            <div>
                                <label class="block text-[10px] font-label-caps text-on-surface-variant mb-1.5 uppercase" x-text="unit"></label>
                                <input x-model="offset[unit.toLowerCase()]" type="number" class="w-full rounded-lg border-outline-variant/40 bg-surface-container-low h-10 px-3 text-sm cursor-pointer">
                            </div>
                        </template>
                    </div>
                </div>
                <button @click="calculateOffset()" class="group bg-secondary hover:bg-secondary-container text-on-secondary font-semibold py-3.5 px-10 rounded-xl transition-all duration-300 shadow-md hover:shadow-glow flex items-center gap-2.5 cursor-pointer">
                    <span class="material-symbols-outlined transition-transform duration-300 group-hover:rotate-12">restore</span>
                    Calculate Result
                </button>
            </div>

            <!-- Tab Content: Working Days -->
            <div x-show="activeTab === 'working'" class="space-y-8" x-cloak>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="group">
                        <label class="block font-label-caps text-on-surface mb-2.5 uppercase tracking-wider text-xs cursor-pointer">Start Date</label>
                        <input x-model="working.start" type="date" class="w-full rounded-xl border-outline-variant/50 h-13 px-4 text-on-surface bg-surface-container-low font-body-md border cursor-pointer">
                    </div>
                    <div class="group">
                        <label class="block font-label-caps text-on-surface mb-2.5 uppercase tracking-wider text-xs cursor-pointer">End Date</label>
                        <input x-model="working.end" type="date" class="w-full rounded-xl border-outline-variant/50 h-13 px-4 text-on-surface bg-surface-container-low font-body-md border cursor-pointer">
                    </div>
                </div>

                <!-- Custom Weekend Selector -->
                <div class="bg-surface-container-low p-6 rounded-2xl border border-outline-variant/30">
                    <label class="block font-label-caps text-on-surface mb-4 uppercase tracking-wider text-xs">Weekend Selection</label>
                    <div class="flex flex-wrap gap-3">
                        <template x-for="(day, index) in ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']" :key="index">
                            <label class="flex items-center gap-2 px-3 py-1.5 rounded-lg border border-outline-variant/40 cursor-pointer transition-all hover:bg-surface-container-high"
                                   :class="working.weekends.includes(index) ? 'bg-secondary text-on-secondary border-secondary' : 'bg-surface-container-lowest text-on-surface-variant'">
                                <input type="checkbox" :value="index" 
                                       :checked="working.weekends.includes(index)"
                                       @change="if($el.checked) { working.weekends.push(index) } else { working.weekends = working.weekends.filter(i => i !== index) }"
                                       class="hidden">
                                <span class="text-xs font-bold" x-text="day"></span>
                            </label>
                        </template>
                    </div>
                </div>

                <!-- Shift Settings -->
                <div class="space-y-4">
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" x-model="working.useShift" class="w-5 h-5 rounded border-outline-variant text-secondary focus:ring-secondary/20">
                        <span class="text-on-surface-variant font-body-md group-hover:text-on-surface transition-colors font-semibold">Enable Shift-Based Calculation</span>
                    </label>

                    <div x-show="working.useShift" x-collapse x-cloak class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                        <div>
                            <label class="block text-[10px] font-label-caps text-on-surface-variant mb-1.5 uppercase cursor-pointer">Shift Start</label>
                            <input x-model="working.shiftStart" type="time" class="w-full rounded-lg border-outline-variant/40 bg-surface-container-low h-10 px-3 text-sm cursor-pointer">
                        </div>
                        <div>
                            <label class="block text-[10px] font-label-caps text-on-surface-variant mb-1.5 uppercase cursor-pointer">Shift End</label>
                            <input x-model="working.shiftEnd" type="time" class="w-full rounded-lg border-outline-variant/40 bg-surface-container-low h-10 px-3 text-sm cursor-pointer">
                        </div>
                        <div>
                            <label class="block text-[10px] font-label-caps text-on-surface-variant mb-1.5 uppercase cursor-pointer">Lunch Break (min)</label>
                            <input x-model.number="working.lunchMinutes" type="number" class="w-full rounded-lg border-outline-variant/40 bg-surface-container-low h-10 px-3 text-sm cursor-pointer">
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-6">
                    <button @click="calculateWorking()" class="group bg-secondary hover:bg-secondary-container text-on-secondary font-semibold py-3.5 px-10 rounded-xl transition-all duration-300 shadow-md hover:shadow-glow flex items-center gap-2.5 cursor-pointer">
                        <span class="material-symbols-outlined transition-transform duration-300 group-hover:rotate-12">work_history</span>
                        Calculate Business Duration
                    </button>
                    
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" x-model="working.excludeHolidays" class="w-5 h-5 rounded border-outline-variant text-secondary focus:ring-secondary/20">
                        <span class="text-xs text-on-surface-variant group-hover:text-on-surface transition-colors uppercase font-bold tracking-tighter">Exclude PK Holidays</span>
                    </label>
                </div>
            </div>

            <!-- Tab Content: Countdown -->
            <div x-show="activeTab === 'countdown'" class="space-y-8" x-cloak>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="group">
                        <label class="block font-label-caps text-on-surface mb-2.5 uppercase tracking-wider text-xs cursor-pointer">Event Name</label>
                        <input x-model="countdown.name" type="text" placeholder="e.g. My Next Vacation" class="w-full rounded-xl border-outline-variant/50 h-13 px-4 text-on-surface bg-surface-container-low font-body-md border cursor-pointer">
                    </div>
                    <div class="group">
                        <label class="block font-label-caps text-on-surface mb-2.5 uppercase tracking-wider text-xs cursor-pointer">Target Date & Time</label>
                        <input x-model="countdown.target" type="datetime-local" class="w-full rounded-xl border-outline-variant/50 h-13 px-4 text-on-surface bg-surface-container-low font-body-md border cursor-pointer">
                    </div>
                </div>
                
                <!-- Live Countdown Display -->
                <div x-show="countdown.target" class="bg-surface-container-low rounded-2xl p-8 border border-outline-variant/30 text-center relative overflow-hidden">
                    <!-- Progress Background -->
                    <div class="absolute bottom-0 left-0 h-1 bg-secondary transition-all duration-1000" :style="`width: ${countdownResult.percent}%`"></div>
                    
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-on-surface-variant font-label-caps text-xs tracking-widest uppercase" x-text="countdown.name || 'Countdown Timer'"></h3>
                        <button @click="exportToCalendar()" class="text-[10px] font-bold text-secondary hover:text-secondary-container flex items-center gap-1 transition-colors">
                            <span class="material-symbols-outlined text-sm">calendar_add_on</span>
                            ADD TO CALENDAR
                        </button>
                    </div>

                    <div class="flex justify-center gap-4 sm:gap-8">
                        <template x-for="unit in ['days', 'hours', 'minutes', 'seconds']" :key="unit">
                            <div class="flex flex-col items-center">
                                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-white rounded-2xl shadow-sm border border-outline-variant/20 flex items-center justify-center mb-2">
                                    <span class="font-display text-2xl sm:text-3xl text-secondary" x-text="countdownResult[unit] || '00'"></span>
                                </div>
                                <span class="text-[10px] font-bold text-on-surface-variant uppercase tracking-wider" x-text="unit"></span>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Results Display Area -->
            <div x-show="showResults" x-transition class="mt-12 pt-12 border-t border-outline-variant/30" x-cloak>
                <div class="flex items-center justify-between mb-8">
                    <h2 class="font-h2 text-on-surface">Calculation Results</h2>
                    <div class="flex items-center gap-2">
                        <button @click="updateUrl(); navigator.clipboard.writeText(window.location.href); alert('Calculation link copied to clipboard!')" 
                                class="text-[10px] font-bold text-secondary flex items-center gap-2 bg-secondary/5 px-4 py-2 rounded-xl hover:bg-secondary/10 transition-all cursor-pointer uppercase tracking-widest">
                            <span class="material-symbols-outlined text-sm">share</span>
                            Share
                        </button>
                        <button @click="downloadResults()" 
                                class="text-[10px] font-bold text-primary flex items-center gap-2 bg-primary/5 px-4 py-2 rounded-xl hover:bg-primary/10 transition-all cursor-pointer uppercase tracking-widest">
                            <span class="material-symbols-outlined text-sm">download</span>
                            Download PNG
                        </button>
                    </div>
                </div>

                <div id="duration-results-capture" class="bg-surface-container-low rounded-3xl p-6 sm:p-8 border border-outline-variant/30">

                <!-- Professional Tools: Billing -->
                <div class="bg-gradient-to-r from-primary-fixed/5 to-secondary/5 rounded-2xl p-6 mb-8 border border-outline-variant/30 flex flex-col md:flex-row items-center gap-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-secondary/10 rounded-full flex items-center justify-center text-secondary">
                            <span class="material-symbols-outlined">payments</span>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-on-surface uppercase tracking-wider">Billing Calculator</h4>
                            <p class="text-[10px] text-on-surface-variant">Estimate costs based on this duration</p>
                        </div>
                    </div>
                    <div class="flex flex-1 items-center gap-4 w-full md:w-auto">
                        <div class="flex-1">
                            <input x-model.number="billing.rate" type="number" placeholder="Rate (e.g. 50)" class="w-full rounded-lg border-outline-variant/40 bg-white h-10 px-3 text-sm focus:border-secondary cursor-pointer">
                        </div>
                        <select x-model="billing.unit" class="rounded-lg border-outline-variant/40 bg-white h-10 px-3 text-sm focus:border-secondary cursor-pointer">
                            <option value="hour">per Hour</option>
                            <option value="day">per Day</option>
                        </select>
                        <button @click="applyBilling()" class="bg-secondary text-on-secondary px-6 py-2 rounded-lg text-xs font-bold shadow-sm hover:bg-secondary-container transition-all cursor-pointer">APPLY</button>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                    <template x-for="stat in mainStats" :key="stat.label">
                        <div class="group bg-white p-8 rounded-3xl border border-outline-variant/30 shadow-xs hover:bg-secondary hover:border-secondary transition-all duration-500 text-center cursor-default min-h-[160px] flex flex-col justify-center">
                            <div class="font-display text-3xl md:text-4xl text-secondary group-hover:text-white transition-colors duration-500 mb-2 break-words" x-text="stat.value">0</div>
                            <div class="text-[11px] font-bold text-on-surface-variant uppercase tracking-[0.2em] group-hover:text-white/80 transition-colors duration-500" x-text="stat.label"></div>
                        </div>
                    </template>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- High Precision Totals -->
                    <div class="bg-surface-container-low rounded-3xl p-8 border border-outline-variant/30">
                        <h3 class="font-h3 text-on-surface mb-6 flex items-center gap-2">
                            <span class="material-symbols-outlined text-secondary text-lg">precision_manufacturing</span>
                            Precision Totals
                        </h3>
                        <div class="space-y-4">
                            <template x-for="sub in subStats" :key="sub.label">
                                <div class="flex justify-between items-center py-2.5 border-b border-outline-variant/20 last:border-0 group/row">
                                    <span class="text-sm text-on-surface-variant group-hover/row:text-on-surface transition-colors" x-text="sub.label"></span>
                                    <span class="text-sm font-display text-on-surface" x-text="sub.value"></span>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Comparison/Meta Info -->
                    <div class="bg-surface-container-low rounded-3xl p-8 border border-outline-variant/30">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="font-h3 text-on-surface flex items-center gap-2">
                                <span class="material-symbols-outlined text-secondary text-lg">insights</span>
                                Time Insights
                            </h3>
                            <span class="text-[10px] font-bold text-on-surface-variant uppercase tracking-wider bg-surface-container-high px-2 py-1 rounded-md">Metadata</span>
                        </div>
                        <p class="text-[11px] text-on-surface-variant mb-6 leading-relaxed">Technical formats and biological perspectives based on your calculation.</p>
                        <div class="space-y-4">
                            <template x-for="meta in metaStats" :key="meta.label">
                                <div class="flex justify-between items-center py-2.5 border-b border-outline-variant/20 last:border-0 group/row">
                                    <span class="text-sm text-on-surface-variant group-hover/row:text-on-surface transition-colors" x-text="meta.label"></span>
                                    <span class="text-sm font-semibold text-on-surface" x-text="meta.value"></span>
                                </div>
                            </template>
                            <div x-show="!metaStats.length" class="text-center py-8 text-on-surface-variant/40 italic text-sm">
                                No additional insights available for this calculation.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </section>

        <!-- SEO Content -->
        <article class="bg-surface-container-lowest rounded-3xl shadow-card border border-outline-variant/40 p-6 sm:p-10">
            <h2 class="font-h2 text-on-surface mb-6">Why Use Our Advanced Time Calculator?</h2>
            <p class="text-on-surface-variant font-body-md mb-4 leading-relaxed">
                Whether you're planning a project, tracking your age down to the second, or calculating working days for a professional deadline, our <strong>Advanced Time Duration Calculator</strong> provides precision and ease of use.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
                <div class="space-y-3">
                    <h4 class="font-h3 text-on-surface">Precise Date Difference</h4>
                    <p class="text-sm text-on-surface-variant">Calculate the exact distance between two points in time, accounting for leap years and daylight saving transitions.</p>
                </div>
                <div class="space-y-3">
                    <h4 class="font-h3 text-on-surface">Working Days Logic</h4>
                    <p class="text-sm text-on-surface-variant">Quickly identify business days between dates. Includes optional support for regional holidays to ensure project accuracy.</p>
                </div>
            </div>
        </article>

    </div>

    <!-- Right Column (1/3) -->
    <div class="lg:w-1/3 flex flex-col gap-stack-lg order-1 lg:order-2">
        <div class="sticky top-24 flex flex-col gap-stack-lg">
            <!-- Instructions Card -->
            <div class="bg-gradient-to-br from-secondary/5 to-primary-fixed/10 rounded-2xl border border-secondary/10 p-6 relative overflow-hidden" data-reveal="fade-up">
                <div class="relative">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="material-symbols-outlined text-secondary">help</span>
                        <h4 class="font-h3 text-on-surface">Quick Help</h4>
                    </div>
                    <ul class="text-sm text-on-surface-variant space-y-3 leading-relaxed">
                        <li>• Use <strong>Date Difference</strong> for precise project durations.</li>
                        <li>• <strong>Age Calculator</strong> shows your exact age and birthday countdown.</li>
                        <li>• <strong>Add/Subtract</strong> helps in finding future or past deadlines.</li>
                        <li>• <strong>Working Days</strong> excludes weekends automatically.</li>
                    </ul>
                </div>
            </div>

            <!-- Ad/Promo Card -->
            <div class="bg-surface-container-lowest rounded-2xl shadow-card border border-outline-variant/40 p-6" data-reveal="fade-up" data-reveal-delay="100">
                <h3 class="font-h3 text-on-surface mb-4 pb-3 border-b border-outline-variant/30 flex items-center gap-2">
                    <span class="material-symbols-outlined text-secondary text-lg">bolt</span>
                    Quick Links
                </h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('age-calculator') }}" class="flex items-center justify-between p-3 rounded-xl hover:bg-surface-container-low transition-all group">
                        <span class="text-sm text-on-surface">Age Calculator</span>
                        <span class="material-symbols-outlined text-sm text-on-surface-variant group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </a></li>
                    <li><a href="{{ route('blog.index') }}" class="flex items-center justify-between p-3 rounded-xl hover:bg-surface-container-low transition-all group">
                        <span class="text-sm text-on-surface">Read our Blog</span>
                        <span class="material-symbols-outlined text-sm text-on-surface-variant group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
function timeCalculator() {
    return {
        activeTab: 'diff',
        showResults: false,
        tabs: [
            { id: 'diff', label: 'Date Diff', icon: 'date_range' },
            { id: 'offset', label: 'Add/Sub', icon: 'add_circle' },
            { id: 'working', label: 'Working', icon: 'work' },
            { id: 'countdown', label: 'Countdown', icon: 'timer' },
        ],
        diff: { start: '', end: '' },
        age: { dob: '', at: '{{ date('Y-m-d') }}' },
        offset: { base: '{{ date('Y-m-d\TH:i') }}', op: 'add', years: 0, months: 0, days: 0, hours: 0, minutes: 0 },
        working: { 
            start: '', 
            end: '', 
            excludeHolidays: false,
            weekends: [0, 6], // Sunday, Saturday
            useShift: false,
            shiftStart: '09:00',
            shiftEnd: '17:00',
            lunchMinutes: 60
        },
        countdown: { name: '', target: '' },
        billing: { rate: 0, unit: 'hour' },
        
        countdownResult: { days: '00', hours: '00', minutes: '00', seconds: '00', percent: 0 },
        mainStats: [],
        subStats: [],
        metaStats: [],
        
        init() {
            this.loadFromUrl();
            setInterval(() => this.tickCountdown(), 1000);
            
            // Auto-calculate if data is loaded from URL
            if (this.diff.start && this.diff.end) this.calculateDiff();
            if (this.countdown.target) this.tickCountdown();
        },

        loadFromUrl() {
            const params = new URLSearchParams(window.location.search);
            if (params.has('tab')) this.activeTab = params.get('tab');
            if (params.has('ds')) this.diff.start = params.get('ds');
            if (params.has('de')) this.diff.end = params.get('de');
            if (params.has('ob')) this.offset.base = params.get('ob');
            if (params.has('ws')) this.working.start = params.get('ws');
            if (params.has('we')) this.working.end = params.get('we');
            if (params.has('ct')) this.countdown.target = params.get('ct');
            if (params.has('cn')) this.countdown.name = params.get('cn');
            if (params.has('br')) this.billing.rate = params.get('br');
            if (params.has('bu')) this.billing.unit = params.get('bu');
        },

        updateUrl() {
            const params = new URLSearchParams();
            params.set('tab', this.activeTab);
            if (this.diff.start) params.set('ds', this.diff.start);
            if (this.diff.end) params.set('de', this.diff.end);
            if (this.offset.base) params.set('ob', this.offset.base);
            if (this.working.start) params.set('ws', this.working.start);
            if (this.working.end) params.set('we', this.working.end);
            if (this.countdown.target) params.set('ct', this.countdown.target);
            if (this.countdown.name) params.set('cn', this.countdown.name);
            if (this.billing.rate) params.set('br', this.billing.rate);
            if (this.billing.unit) params.set('bu', this.billing.unit);
            
            const newUrl = window.location.pathname + '?' + params.toString();
            window.history.pushState({ path: newUrl }, '', newUrl);
        },

        applyBilling() {
            if (this.activeTab === 'diff') this.calculateDiff();
            if (this.activeTab === 'working') this.calculateWorking();
            if (this.activeTab === 'offset') this.calculateOffset();
            this.updateUrl();
        },

        calculateDiff() {
            if (!this.diff.start || !this.diff.end) return;
            const start = new Date(this.diff.start);
            const end = new Date(this.diff.end);
            const diff = Math.abs(end - start);
            
            this.processDuration(diff, start, end);
            this.showResults = true;
            this.updateUrl();
        },

        calculateOffset() {
            if (!this.offset.base) return;
            const base = new Date(this.offset.base);
            const original = new Date(base);
            const multi = this.offset.op === 'add' ? 1 : -1;
            
            base.setFullYear(base.getFullYear() + (this.offset.years * multi));
            base.setMonth(base.getMonth() + (this.offset.months * multi));
            base.setDate(base.getDate() + (this.offset.days * multi));
            base.setHours(base.getHours() + (this.offset.hours * multi));
            base.setMinutes(base.getMinutes() + (this.offset.minutes * multi));

            this.mainStats = [
                { label: 'Resulting Date', value: base.toLocaleDateString() },
                { label: 'Resulting Time', value: base.toLocaleTimeString() }
            ];
            this.subStats = [
                { label: 'Operation', value: this.offset.op === 'add' ? 'Addition' : 'Subtraction' },
                { label: 'Original Date', value: original.toLocaleDateString() }
            ];
            this.metaStats = [
                { label: 'ISO 8601 Format', value: base.toISOString() },
                { label: 'Unix Timestamp', value: base.getTime().toLocaleString() + ' ms' }
            ];
            this.showResults = true;
            this.updateUrl();
        },

        calculateWorking() {
            if (!this.working.start || !this.working.end) return;
            const start = new Date(this.working.start);
            const end = new Date(this.working.end);
            
            let totalDays = 0;
            let workingDays = 0;
            let weekendDays = 0;
            let holidayCount = 0;
            
            const holidays = [
                '02-05', '03-23', '05-01', '08-14', '11-09', '12-25',
            ];

            let current = new Date(start);
            while (current <= end) {
                totalDays++;
                const day = current.getDay();
                const isWeekend = this.working.weekends.includes(day);
                
                const mmdd = (current.getMonth() + 1).toString().padStart(2, '0') + '-' + current.getDate().toString().padStart(2, '0');
                const isHoliday = holidays.includes(mmdd);

                if (isWeekend) {
                    weekendDays++;
                } else if (this.working.excludeHolidays && isHoliday) {
                    holidayCount++;
                } else {
                    workingDays++;
                }
                current.setDate(current.getDate() + 1);
            }

            // Shift Calculation
            let totalHours = workingDays * 24;
            if (this.working.useShift) {
                const s = this.working.shiftStart.split(':');
                const e = this.working.shiftEnd.split(':');
                const startHour = parseInt(s[0]) + (parseInt(s[1])/60);
                const endHour = parseInt(e[0]) + (parseInt(e[1])/60);
                const shiftLength = endHour - startHour;
                totalHours = workingDays * (shiftLength - (this.working.lunchMinutes / 60));
            }

            this.mainStats = [
                { label: 'Working Days', value: workingDays },
                { label: 'Work Hours', value: totalHours.toFixed(1) }
            ];

            // Add Billing for Working Days
            if (this.billing.rate > 0) {
                const cost = this.billing.unit === 'hour' ? totalHours * this.billing.rate : workingDays * this.billing.rate;
                this.mainStats.push({ label: 'Estimated Cost', value: '$' + cost.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) });
            }

            this.subStats = [
                { label: 'Calendar Days', value: totalDays },
                { label: 'Weekend Days', value: weekendDays },
                { label: 'Holidays', value: holidayCount },
                { label: 'Rest Days', value: weekendDays + holidayCount }
            ];
            this.metaStats = [
                { label: 'Work Percentage', value: ((workingDays/totalDays)*100).toFixed(1) + '%' },
                { label: 'Shift Applied', value: this.working.useShift ? 'Yes' : 'No' }
            ];
            this.showResults = true;
            this.updateUrl();
        },

        tickCountdown() {
            if (!this.countdown.target) return;
            const target = new Date(this.countdown.target);
            const now = new Date();
            const diff = target - now;

            if (diff <= 0) {
                this.countdownResult = { days: '00', hours: '00', minutes: '00', seconds: '00', percent: 100 };
                return;
            }

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            this.countdownResult = {
                days: days.toString().padStart(2, '0'),
                hours: Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)).toString().padStart(2, '0'),
                minutes: Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60)).toString().padStart(2, '0'),
                seconds: Math.floor((diff % (1000 * 60)) / 1000).toString().padStart(2, '0'),
                percent: Math.min(100, Math.max(0, 100 - (days / 365 * 100))) // Simple year-scale progress
            };
        },

        exportToCalendar() {
            let title = this.countdown.name || 'Time Tool Event';
            let start = this.countdown.target.replace(/-|:|\.\d+/g, '');
            let end = start; // Instantaneous event
            
            const googleUrl = `https://www.google.com/calendar/render?action=TEMPLATE&text=${encodeURIComponent(title)}&dates=${start}/${end}&details=Generated by ToolsSite Advanced Time Calculator`;
            window.open(googleUrl, '_blank');
        },

        async downloadResults() {
            const element = document.getElementById('duration-results-capture');
            const canvas = await html2canvas(element, {
                backgroundColor: '#F8F9FF',
                scale: 2,
                logging: false,
                useCORS: true
            });
            
            const link = document.createElement('a');
            link.download = `time-duration-result.png`;
            link.href = canvas.toDataURL('image/png');
            link.click();
        },

        processDuration(diff, d1, d2) {
            const ms = diff;
            const sec = Math.floor(diff / 1000);
            const min = Math.floor(sec / 60);
            const hr = Math.floor(min / 60);
            const day = Math.floor(hr / 24);
            const week = Math.floor(day / 7);
            const mon = Math.floor(day / 30.4375);
            const yr = Math.floor(day / 365.25);

            // Broken down logic
            let start = d1 < d2 ? new Date(d1) : new Date(d2);
            let end = d1 < d2 ? new Date(d2) : new Date(d1);
            let bY = end.getFullYear() - start.getFullYear();
            let bM = end.getMonth() - start.getMonth();
            let bD = end.getDate() - start.getDate();

            if (bD < 0) { bM--; const lm = new Date(end.getFullYear(), end.getMonth(), 0); bD += lm.getDate(); }
            if (bM < 0) { bY--; bM += 12; }

            this.mainStats = [
                { label: 'Duration', value: `${bY}y ${bM}m ${bD}d` },
                { label: 'Total Days', value: day.toLocaleString() }
            ];

            this.subStats = [
                { label: 'Total Months', value: mon.toLocaleString() },
                { label: 'Total Hours', value: hr.toLocaleString() },
                { label: 'Total Minutes', value: min.toLocaleString() },
                { label: 'Total Seconds', value: sec.toLocaleString() },
                { label: 'Milliseconds', value: ms.toLocaleString() }
            ];
            
            // Advanced Insights
            this.metaStats = [
                { label: 'Lunar Cycles', value: (day / 29.53).toFixed(2) },
                { label: 'Martian Sols', value: (day / 1.02749).toFixed(2) },
                { label: 'Sun Rotations', value: (day / 27).toFixed(2) },
                { label: 'Saturn Years', value: (day / 10759.22).toFixed(5) },
                { label: 'Estimated Blinks', value: (min * 15).toLocaleString() },
                { label: 'Avg. Heartbeats', value: (min * 80).toLocaleString() },
                { label: 'Avg. Breaths', value: (min * 16).toLocaleString() },
                { label: 'Year Percentage', value: ((day / 365.25) * 100).toFixed(2) + '%' }
            ];

            // Historical Parallels
            const parallels = [
                { d: 112, t: 'The Spanish-American War' },
                { d: 365, t: 'A trip to Mars (One Way)' },
                { d: 15, t: 'Apollo 11 Mission Length' },
                { d: 100, t: "Napoleon's Hundred Days" }
            ];
            const match = parallels.find(p => Math.abs(p.d - day) < (day * 0.1));
            if (match) this.metaStats.push({ label: 'Historical Scale', value: match.t });

            // Billing
            if (this.billing.rate > 0) {
                const totalHoursPrecise = diff / (1000 * 60 * 60);
                const totalDaysPrecise = diff / (1000 * 60 * 60 * 24);
                const total = this.billing.unit === 'hour' ? totalHoursPrecise * this.billing.rate : totalDaysPrecise * this.billing.rate;
                this.mainStats.push({ label: 'Estimated Cost', value: '$' + total.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) });
            }
        }
    }
}
</script>
@endpush

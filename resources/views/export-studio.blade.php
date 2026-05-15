@extends('layouts.app')

@section('title', 'Customize & Print Studio — Premium Age & Certificate Reports')
@section('meta_description', 'Design and download beautiful, full-detail age analysis and relationship comparison certificates. Featuring stylish certificate fonts, full zodiac facts, life progress battery, and historical timelines.')

@section('content')
    <!-- Google Fonts for Premium Designing (Nikkah/Certificates styles) -->
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cinzel:wght@400;600;800&family=Great+Vibes&family=Montserrat:ital,wght@0,400;0,600;0,800;1,400&family=Playfair+Display:ital,wght@0,400;0,600;0,800;1,400&family=Space+Mono&display=swap" rel="stylesheet">

    <div x-data="exportStudio()" x-init="init()" class="max-w-7xl mx-auto pb-16 px-4 sm:px-6 lg:px-8" x-cloak>
        <!-- Header -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8 pb-6 border-b border-outline-variant/30">
            <div>
                <div class="flex items-center gap-2 text-primary font-bold mb-1">
                    <span class="material-symbols-outlined text-sm">workspace_premium</span>
                    <span class="text-xs uppercase tracking-widest">Document & Certificate Designer</span>
                </div>
                <h1 class="font-h1 text-on-surface text-2xl sm:text-4xl tracking-tight">Customize & Print Studio</h1>
            </div>
            
            <a href="{{ route('age-calculator') }}" class="flex items-center gap-2 text-xs font-bold text-on-surface-variant hover:text-on-surface bg-surface-container-low px-4 py-2.5 rounded-xl border border-outline-variant/40 transition-all shadow-xs hover:shadow-sm">
                <span class="material-symbols-outlined text-sm">arrow_back</span>
                Back to Calculator
            </a>
        </div>

        <!-- Single-Column Flow with Persistent Studio Toolbox on Top -->
        <div class="flex flex-col gap-6 items-stretch">
            <!-- Report Configuration & Input Variables (Top Data Card) -->
            <div class="bg-surface-container-lowest border border-outline-variant/40 rounded-2xl p-4 sm:p-6 shadow-sm text-left">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4 pb-3 border-b border-outline-variant/30">
                    <div class="flex items-center gap-2 font-bold text-xs text-primary uppercase tracking-wider">
                        <span class="material-symbols-outlined text-sm">settings</span>
                        <span>Report Details &amp; Date Setup</span>
                    </div>
                    <!-- Canvas Format Switcher -->
                    <div class="flex items-center gap-2 self-end md:self-auto">
                        <span class="text-[11px] font-bold text-on-surface-variant">Canvas Aspect:</span>
                        <div class="flex bg-surface-container-low rounded-lg p-0.5 border border-outline-variant/40">
                            <button type="button" @click="layoutMode = 'document'" :class="layoutMode === 'document' ? 'bg-white text-gray-900 shadow-xs font-bold' : 'text-on-surface-variant hover:text-on-surface'" class="py-1.5 px-3 rounded-md text-xs transition-all flex items-center gap-1 cursor-pointer">
                                <span class="material-symbols-outlined text-xs">article</span>
                                Detailed Document
                            </button>
                            <button type="button" @click="layoutMode = 'story'" :class="layoutMode === 'story' ? 'bg-white text-gray-900 shadow-xs font-bold' : 'text-on-surface-variant hover:text-on-surface'" class="py-1.5 px-3 rounded-md text-xs transition-all flex items-center gap-1 cursor-pointer">
                                <span class="material-symbols-outlined text-xs">amp_stories</span>
                                Social Story (9:16)
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Form Inputs Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block font-label-caps text-[11px] text-on-surface uppercase tracking-wider mb-1 font-bold">Calculation Mode</label>
                        <div class="p-2.5 bg-surface-container-low rounded-xl border border-outline-variant/40 font-bold text-xs text-primary uppercase tracking-wider flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-xs text-secondary">lock</span>
                            <span class="truncate" x-text="mode === 'age' ? 'Single Age Analysis' : 'Age Diff Comparison'"></span>
                        </div>
                    </div>
                    <div>
                        <label class="block font-label-caps text-[11px] text-on-surface uppercase tracking-wider mb-1 font-bold truncate" x-text="mode === 'age' ? 'Your Name (Optional)' : 'Person 1 Name'"></label>
                        <input type="text" x-model="p1Name" @input="onDataChange()" placeholder="e.g. Alexander" class="w-full p-2.5 bg-surface-container-low border border-outline-variant/40 rounded-xl text-xs font-medium text-on-surface focus:ring-2 focus:ring-primary/20 transition-all">
                    </div>
                    <div>
                        <label class="block font-label-caps text-[11px] text-on-surface uppercase tracking-wider mb-1 font-bold truncate" x-text="mode === 'age' ? 'Date of Birth' : 'Person 1 Date of Birth'"></label>
                        <input type="date" x-model="dob" @change="onDataChange()" class="w-full p-2.5 bg-surface-container-low border border-outline-variant/40 rounded-xl text-xs font-medium text-on-surface focus:ring-2 focus:ring-primary/20 transition-all cursor-pointer">
                    </div>
                    <template x-if="mode === 'diff'">
                        <div class="col-span-1 sm:col-span-2 md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-4 mt-2 md:mt-0">
                            <div>
                                <label class="block font-label-caps text-[11px] text-on-surface uppercase tracking-wider mb-1 font-bold truncate">Person 2 Name</label>
                                <input type="text" x-model="p2Name" @input="onDataChange()" placeholder="e.g. Eleanor" class="w-full p-2.5 bg-surface-container-low border border-outline-variant/40 rounded-xl text-xs font-medium text-on-surface focus:ring-2 focus:ring-primary/20 transition-all">
                            </div>
                            <div>
                                <label class="block font-label-caps text-[11px] text-on-surface uppercase tracking-wider mb-1 font-bold truncate">Person 2 Date of Birth</label>
                                <input type="date" x-model="targetDate" @change="onDataChange()" class="w-full p-2.5 bg-surface-container-low border border-outline-variant/40 rounded-xl text-xs font-medium text-on-surface focus:ring-2 focus:ring-primary/20 transition-all cursor-pointer">
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Persistent Styling Studio Tool Box (Placed Directly On Top of Canvas) -->
            <div class="sticky top-0 z-40 bg-surface-container-lowest/95 backdrop-blur-md border border-outline-variant/40 rounded-2xl p-4 shadow-md transition-all text-left">
                <div class="flex flex-col gap-3">
                    <!-- Row 1: Style Presets & Precise Pickers -->
                    <div class="flex flex-col lg:flex-row items-stretch lg:items-center justify-between gap-3 border-b border-outline-variant/20 pb-3">
                        <div class="flex-1 min-w-0">
                            <span class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-wider mb-1.5">Curated Aesthetics &amp; Presets</span>
                            <div class="flex items-center gap-1.5 overflow-x-auto pb-1.5 sm:pb-0 scrollbar-thin pr-2">
                                <button type="button" @click.prevent="applyPreset('#ffffff', '#111827', 'font-montserrat', 'border-none', '#e2e8f0')" class="px-2.5 py-1.5 border rounded-lg hover:border-primary transition-all cursor-pointer bg-white text-gray-900 shadow-2xs shrink-0 text-left">
                                    <span class="font-bold text-[11px] block leading-none">Prestige</span>
                                </button>
                                <button type="button" @click.prevent="applyPreset('#fdfbf7', '#451a03', 'font-vibes', 'border-[12px] border-double border-amber-800/40', '#9a3412')" class="px-2.5 py-1.5 border rounded-lg hover:border-amber-600 transition-all cursor-pointer bg-[#fdfbf7] text-amber-950 shadow-2xs shrink-0 text-left">
                                    <span class="font-bold text-[11px] font-vibes block leading-none">Royal Nikkah</span>
                                </button>
                                <button type="button" @click.prevent="applyPreset('#0f172a', '#f1f5f9', 'font-cinzel', 'border-4 border-indigo-400/40', '#818cf8')" class="px-2.5 py-1.5 border rounded-lg hover:border-indigo-400 transition-all cursor-pointer bg-slate-900 text-indigo-100 shadow-2xs shrink-0 text-left">
                                    <span class="font-bold text-[11px] font-cinzel block leading-none">Imperial</span>
                                </button>
                                <button type="button" @click.prevent="applyPreset('#fafaf9', '#1c1917', 'font-playfair', 'border-x-2 border-y-[8px] border-stone-800/20', '#57534e')" class="px-2.5 py-1.5 border rounded-lg hover:border-stone-500 transition-all cursor-pointer bg-stone-50 text-stone-900 shadow-2xs shrink-0 text-left">
                                    <span class="font-bold text-[11px] font-playfair block leading-none">Editorial</span>
                                </button>
                                <button type="button" @click.prevent="applyPreset('#ecfdf5', '#064e3b', 'font-montserrat', 'border-dashed-elegant', '#059669')" class="px-2.5 py-1.5 border rounded-lg hover:border-emerald-500 transition-all cursor-pointer bg-emerald-50 text-emerald-950 shadow-2xs shrink-0 text-left">
                                    <span class="font-bold text-[11px] block leading-none">Emerald Mint</span>
                                </button>
                                <button type="button" @click.prevent="applyPreset('#fff1f2', '#881337', 'font-alex', 'border-zigzag', '#e11d48')" class="px-2.5 py-1.5 border rounded-lg hover:border-rose-500 transition-all cursor-pointer bg-rose-50 text-rose-950 shadow-2xs shrink-0 text-left">
                                    <span class="font-bold text-[11px] font-alex block leading-none">Roseate</span>
                                </button>
                                <button type="button" @click.prevent="applyPreset('#fffbeb', '#78350f', 'font-cinzel', 'border-[12px] border-double border-amber-800/40', '#d97706')" class="px-2.5 py-1.5 border rounded-lg hover:border-amber-500 transition-all cursor-pointer bg-amber-50 text-amber-950 shadow-2xs shrink-0 text-left">
                                    <span class="font-bold text-[11px] font-cinzel block leading-none">Solar Gold</span>
                                </button>
                                <button type="button" @click.prevent="applyPreset('#fefce8', '#422006', 'font-space', 'border-thick-stamp', '#ca8a04')" class="px-2.5 py-1.5 border rounded-lg hover:border-yellow-600 transition-all cursor-pointer bg-yellow-50 text-yellow-950 shadow-2xs shrink-0 text-left">
                                    <span class="font-bold text-[11px] font-space block leading-none">Typewriter</span>
                                </button>
                            </div>
                        </div>

                        <!-- Aesthetic Color Tuners -->
                        <div class="flex items-center gap-3 shrink-0 pt-1 lg:pt-0">
                            <div>
                                <span class="block text-[9px] font-bold text-on-surface-variant uppercase tracking-wider mb-1">Canvas Fill</span>
                                <div class="flex items-center gap-1 bg-surface-container-low px-2 py-1 rounded-lg border border-outline-variant/40">
                                    <input type="color" x-model="customBg" class="w-4 h-4 rounded cursor-pointer border-none bg-transparent shrink-0">
                                    <span class="text-[10px] font-mono font-bold uppercase w-11 truncate" x-text="customBg"></span>
                                </div>
                            </div>
                            <div>
                                <span class="block text-[9px] font-bold text-on-surface-variant uppercase tracking-wider mb-1">Ink Color</span>
                                <div class="flex items-center gap-1 bg-surface-container-low px-2 py-1 rounded-lg border border-outline-variant/40">
                                    <input type="color" x-model="customText" class="w-4 h-4 rounded cursor-pointer border-none bg-transparent shrink-0">
                                    <span class="text-[10px] font-mono font-bold uppercase w-11 truncate" x-text="customText"></span>
                                </div>
                            </div>
                            <div>
                                <span class="block text-[9px] font-bold text-on-surface-variant uppercase tracking-wider mb-1">Frame Tint</span>
                                <div class="flex items-center gap-1 bg-surface-container-low px-2 py-1 rounded-lg border border-outline-variant/40">
                                    <input type="color" x-model="customBorderColor" class="w-4 h-4 rounded cursor-pointer border-none bg-transparent shrink-0">
                                    <span class="text-[10px] font-mono font-bold uppercase w-11 truncate" x-text="customBorderColor"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Row 2: Typography Font & Border Dropdowns + Export Actions -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 items-center">
                        <div>
                            <span class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-wider mb-1">Typography Font Family</span>
                            <select x-model="customFont" class="w-full p-2 bg-surface-container-low border border-outline-variant/40 rounded-lg text-xs font-medium text-on-surface cursor-pointer focus:ring-2 focus:ring-primary/20 transition-all pr-8">
                                <option value="font-montserrat">Modern Minimalist (Montserrat)</option>
                                <option value="font-cinzel">Imperial Heading (Cinzel)</option>
                                <option value="font-vibes">Elegant Flowing Script (Great Vibes)</option>
                                <option value="font-alex">Wedding Certificate Cursive (Alex Brush)</option>
                                <option value="font-playfair">Classic Literature Serif (Playfair)</option>
                                <option value="font-space">Retro Typewriter (Space Mono)</option>
                            </select>
                        </div>

                        <div>
                            <span class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-wider mb-1">Document Frame Overlay</span>
                            <select x-model="customBorder" class="w-full p-2 bg-surface-container-low border border-outline-variant/40 rounded-lg text-xs font-medium text-on-surface cursor-pointer focus:ring-2 focus:ring-primary/20 transition-all pr-8">
                                <option value="border-none">Modern Borderless</option>
                                <option value="border-2 border-outline-variant/40">Fine Balanced Line</option>
                                <option value="border-[12px] border-double border-amber-800/40">Premium Double Classic</option>
                                <option value="border-zigzag">Zig Zag Striped Ribbon</option>
                                <option value="border-thick-stamp">Royal Thick Stamp</option>
                                <option value="border-dashed-elegant">Dashed Elegance Overlay</option>
                                <option value="border-x-2 border-y-[8px] border-stone-800/20">Editorial Top/Bottom Bars</option>
                                <option value="border-8 border-indigo-500/20">Cosmic Ambient Glow</option>
                            </select>
                        </div>

                        <!-- Export Buttons -->
                        <div class="flex items-center gap-2 pt-1 lg:pt-0">
                            <button type="button" @click="downloadCustomResults('png')" class="flex-1 py-2 px-3 bg-primary hover:bg-primary-container text-on-primary font-bold rounded-lg transition-all shadow-xs flex items-center justify-center gap-1.5 cursor-pointer text-xs uppercase tracking-wider group">
                                <span class="material-symbols-outlined text-sm group-hover:scale-110 transition-transform">image</span>
                                Save PNG
                            </button>
                            <button type="button" @click="downloadCustomResults('pdf')" class="flex-1 py-2 px-3 bg-tertiary hover:bg-tertiary-container text-on-tertiary font-bold rounded-lg transition-all shadow-xs flex items-center justify-center gap-1.5 cursor-pointer text-xs uppercase tracking-wider group">
                                <span class="material-symbols-outlined text-sm group-hover:scale-110 transition-transform">picture_as_pdf</span>
                                Save PDF
                            </button>
                        </div>
                    </div>

                    <!-- Row 3: Live Real-Time Typo-Tuner Status Bar -->
                    <div class="bg-surface-container p-2 sm:p-2.5 rounded-xl border border-primary/20 transition-all mt-0.5" :class="activeElement ? 'ring-1 ring-primary/30 shadow-xs bg-primary/5' : ''">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2">
                            <div class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-sm text-primary shrink-0" x-text="activeElement ? 'tune' : 'touch_app'"></span>
                                <span class="text-xs font-bold text-on-surface truncate max-w-[160px] sm:max-w-xs" x-text="activeElement ? (elementLabels[activeElement] || activeElement) : 'Line Font Size Tuner'"></span>
                                <span x-show="!activeElement" class="text-[11px] text-on-surface-variant font-normal italic leading-tight hidden md:inline"> — Click any line or number on the canvas below to resize</span>
                            </div>
                            
                            <!-- Granular Adjuster Controls -->
                            <div class="w-full sm:w-auto flex items-center gap-2 flex-1 max-w-md justify-end">
                                <template x-if="activeElement">
                                    <div class="flex items-center gap-1 sm:gap-1.5 w-full justify-end">
                                        <span class="text-[11px] font-mono font-bold bg-surface px-1.5 py-0.5 rounded border border-outline-variant/30 text-primary shrink-0" x-text="getCurrentAdjustSize(activeElement) + 'px'"></span>
                                        <button type="button" @click="adjustFontSize(-1)" class="w-6 h-6 bg-surface hover:bg-surface-variant text-on-surface border border-outline-variant/40 rounded font-bold text-xs flex items-center justify-center cursor-pointer shrink-0">
                                            <span class="material-symbols-outlined text-xs leading-none">remove</span>
                                        </button>
                                        <input type="range" min="5" max="80" :value="getCurrentAdjustSize(activeElement)" @input="setFontSize($event.target.value)" class="w-full sm:w-48 accent-primary cursor-pointer shrink-1">
                                        <button type="button" @click="adjustFontSize(1)" class="w-6 h-6 bg-surface hover:bg-surface-variant text-on-surface border border-outline-variant/40 rounded font-bold text-xs flex items-center justify-center cursor-pointer shrink-0">
                                            <span class="material-symbols-outlined text-xs leading-none">add</span>
                                        </button>
                                        <button type="button" @click="resetElementSize()" title="Restore Default Scope Size" class="p-1 text-on-surface-variant hover:text-rose-600 transition-colors shrink-0 cursor-pointer">
                                            <span class="material-symbols-outlined text-xs block">restart_alt</span>
                                        </button>
                                    </div>
                                </template>
                                <template x-if="!activeElement">
                                    <div class="text-[11px] text-on-surface-variant italic md:hidden leading-tight">
                                        Tap any text below to tune
                                    </div>
                                </template>
                                <button x-show="Object.values(fontSizes).some(v => v !== null)" @click="resetAllFontSizes()" type="button" class="text-[10px] text-rose-600 hover:underline font-bold shrink-0 ml-1.5 sm:ml-2 border-l pl-1.5 sm:pl-2 border-outline-variant/30 cursor-pointer">Reset All</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Live Document Preview Canvas Section -->
            <div @click="activeElement = null" class="w-full overflow-x-auto flex justify-center bg-surface-container-lowest border border-outline-variant/30 rounded-2xl p-4 sm:p-10 shadow-sm">
                <!-- Preview Capture Container -->
                <div id="preview-capture"  
                     :style="`background-color: ${customBg}; color: ${customText}; border-color: ${customBorderColor}; --custom-border-color: ${customBorderColor};`"
                     :class="`${customFont} ${customBorder} ` + (layoutMode === 'story' ? 'max-w-[360px] aspect-[9/16] p-4 flex flex-col justify-between' : 'max-w-[850px] p-8 sm:p-14')"
                     class="w-full shadow-card transition-all duration-300 relative box-border overflow-hidden rounded-xs text-left shrink-0">
                     
                     <!-- Premium Background Decorative Watermarks -->
                     <div class="absolute top-0 right-0 p-8 opacity-5 pointer-events-none select-none">
                         <span class="material-symbols-outlined text-[180px]">workspace_premium</span>
                     </div>
                     <div class="absolute bottom-0 left-0 p-8 opacity-5 pointer-events-none select-none">
                         <span class="material-symbols-outlined text-[180px]">auto_awesome</span>
                     </div>

                     <!-- SECTION 1: Certificate Header -->
                     <div class="text-center relative" :class="layoutMode === 'story' ? 'mb-2 border-b pb-2' : 'mb-10 border-b pb-8'" :style="`border-color: ${customText}20;`">
                        <div class="uppercase font-bold font-sans opacity-60" :class="layoutMode === 'story' ? 'text-[7.5px] tracking-wider mb-0.5' : 'tracking-widest text-[10px] sm:text-xs mb-3'">
                            <span @click.stop="activeElement = 'certHeader'" :class="getTextClass('certHeader')" :style="getElementSize('certHeader') ? ('font-size: ' + getElementSize('certHeader')) : ''" x-text="mode === 'age' ? 'Official Chronological Certification' : 'Relationship & Life Alignment Analysis'"></span>
                        </div>
                        <h1 @click.stop="activeElement = 'mainTitle'" :class="getTextClass('mainTitle')" :style="getElementSize('mainTitle') ? ('font-size: ' + getElementSize('mainTitle')) : ''" class="font-extrabold leading-tight mx-auto block" :class="layoutMode === 'story' ? 'text-[22px] mb-1' : 'tracking-tight px-1 text-4xl sm:text-6xl mb-4'" x-text="mode === 'age' ? 'Age Analysis Report' : 'Age Difference Certificate'"></h1>
                        <div @click.stop="activeElement = 'mainSubtitle'" :class="getTextClass('mainSubtitle')" :style="getElementSize('mainSubtitle') ? ('font-size: ' + getElementSize('mainSubtitle')) : ''" class="opacity-80 italic font-medium mx-auto leading-tight block" :class="layoutMode === 'story' ? 'text-[11px]' : 'text-base sm:text-xl'"
                             x-text="p1Name ? p1Name + (p2Name ? ' & ' + p2Name : '') : (mode === 'diff' ? 'Comparative Timeline Review' : 'Individual Lifespan Summary')"></div>
                     </div>

                     <!-- SECTION 2: Master Statement (Core Output) -->
                     <div class="text-center border" :class="layoutMode === 'story' ? 'mb-2 p-2.5 rounded-xl' : 'mb-12 p-6 sm:p-8 rounded-2xl'" :style="`border-color: ${customText}10; background-color: ${customText}03;`">
                        <div @click.stop="activeElement = 'metricLabel'" :class="getTextClass('metricLabel')" :style="getElementSize('metricLabel') ? ('font-size: ' + getElementSize('metricLabel')) : ''" class="uppercase font-bold font-sans opacity-60 mx-auto block" :class="layoutMode === 'story' ? 'text-[7.5px] tracking-wider mb-1' : 'tracking-widest text-[10px] sm:text-xs mb-2'">Primary Time Metric</div>
                        <div @click.stop="activeElement = 'metricNumbers'" :class="getTextClass('metricNumbers')" :style="getElementSize('metricNumbers') ? ('font-size: ' + getElementSize('metricNumbers')) : ''" class="font-black flex items-baseline justify-center mx-auto" :class="layoutMode === 'story' ? 'text-[26px] gap-3 flex-row' : 'text-4xl sm:text-7xl gap-2 sm:gap-3 mb-3 flex-wrap'">
                            <span class="whitespace-nowrap"><span x-text="result.years"></span><span @click.stop="activeElement = 'metricUnits'" :class="getTextClass('metricUnits')" :style="getElementSize('metricUnits') ? ('font-size: ' + getElementSize('metricUnits')) : ''" class="opacity-60 font-normal ml-1 tracking-normal" :class="layoutMode === 'story' ? 'text-[11px]' : 'text-base sm:text-2xl'">Years</span></span>
                            <span class="whitespace-nowrap"><span x-text="result.months"></span><span @click.stop="activeElement = 'metricUnits'" :class="getTextClass('metricUnits')" :style="getElementSize('metricUnits') ? ('font-size: ' + getElementSize('metricUnits')) : ''" class="opacity-60 font-normal ml-1 tracking-normal" :class="layoutMode === 'story' ? 'text-[11px]' : 'text-base sm:text-2xl'">Months</span></span>
                            <span class="whitespace-nowrap"><span x-text="result.days"></span><span @click.stop="activeElement = 'metricUnits'" :class="getTextClass('metricUnits')" :style="getElementSize('metricUnits') ? ('font-size: ' + getElementSize('metricUnits')) : ''" class="opacity-60 font-normal ml-1 tracking-normal" :class="layoutMode === 'story' ? 'text-[11px]' : 'text-base sm:text-2xl'">Days</span></span>
                        </div>
                        <div @click.stop="activeElement = 'metricSubtext'" :class="getTextClass('metricSubtext')" :style="getElementSize('metricSubtext') ? ('font-size: ' + getElementSize('metricSubtext')) : ''" class="opacity-70 font-medium leading-tight mx-auto block" :class="layoutMode === 'story' ? 'text-[8.5px] mt-1' : 'text-sm sm:text-lg mt-3'"
                             x-text="mode === 'age' ? (targetDate === '{{ date('Y-m-d') }}' ? 'Calculated up to the current present day' : 'Calculated exact duration up to ' + targetDate) : 'Absolute dynamic difference separating these birth dates'"></div>
                     </div>

                     <!-- SECTION 3: Complete Granular Units Breakdown -->
                     <div class="mb-12" x-show="layoutMode === 'document'">
                         <h3 class="text-xs sm:text-sm font-bold uppercase tracking-widest opacity-60 mb-4 border-b pb-2 flex items-center gap-2 font-sans" :style="`border-color: ${customText}15;`">
                             <span class="material-symbols-outlined text-sm">grid_view</span>
                             Granular Units Breakdown
                         </h3>
                         
                         <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 sm:gap-4">
                            <div class="p-4 rounded-xl border text-center transition-all" :style="`border-color: ${customText}15; background-color: ${customText}02;`">
                                <div class="text-[9px] sm:text-[11px] uppercase tracking-wider opacity-60 mb-1 font-bold">Total Months</div>
                                <div class="text-lg sm:text-2xl font-bold" x-text="result.totalMonths?.toLocaleString()"></div>
                            </div>
                            <div class="p-4 rounded-xl border text-center transition-all" :style="`border-color: ${customText}15; background-color: ${customText}02;`">
                                <div class="text-[9px] sm:text-[11px] uppercase tracking-wider opacity-60 mb-1 font-bold">Total Weeks</div>
                                <div class="text-lg sm:text-2xl font-bold" x-text="result.totalWeeks?.toLocaleString()"></div>
                            </div>
                            <div class="p-4 rounded-xl border text-center transition-all" :style="`border-color: ${customText}15; background-color: ${customText}02;`">
                                <div class="text-[9px] sm:text-[11px] uppercase tracking-wider opacity-60 mb-1 font-bold">Total Days</div>
                                <div class="text-lg sm:text-2xl font-bold" x-text="result.totalDays?.toLocaleString()"></div>
                            </div>
                            <div class="p-4 rounded-xl border text-center transition-all" :style="`border-color: ${customText}15; background-color: ${customText}02;`">
                                <div class="text-[9px] sm:text-[11px] uppercase tracking-wider opacity-60 mb-1 font-bold">Total Hours</div>
                                <div class="text-lg sm:text-2xl font-bold" x-text="result.totalHours?.toLocaleString()"></div>
                            </div>
                            <div class="p-4 rounded-xl border text-center transition-all" :style="`border-color: ${customText}15; background-color: ${customText}02;`">
                                <div class="text-[9px] sm:text-[11px] uppercase tracking-wider opacity-60 mb-1 font-bold">Total Minutes</div>
                                <div class="text-lg sm:text-2xl font-bold" x-text="result.totalMinutes?.toLocaleString()"></div>
                            </div>
                            <div class="p-4 rounded-xl border text-center transition-all" :style="`border-color: ${customText}15; background-color: ${customText}02;`">
                                <div class="text-[9px] sm:text-[11px] uppercase tracking-wider opacity-60 mb-1 font-bold">Total Seconds</div>
                                <div class="text-lg sm:text-2xl font-bold" x-text="result.totalSeconds?.toLocaleString()"></div>
                            </div>
                         </div>
                     </div>

                     <!-- SECTION 4: Comprehensive Astrological & Calendar Profiles -->
                     <div :class="layoutMode === 'story' ? 'mb-2' : 'mb-12'">
                         <h3 @click.stop="activeElement = 'factTitle'" :class="getTextClass('factTitle')" :style="getElementSize('factTitle') ? ('font-size: ' + getElementSize('factTitle')) : ''" class="font-bold uppercase font-sans opacity-60 border-b flex items-center gap-1 w-full" :class="layoutMode === 'story' ? 'text-[7.5px] tracking-wide mb-1.5 pb-1' : 'tracking-widest text-xs sm:text-sm mb-4 pb-2'" :style="`border-color: ${customText}15;`">
                             <span class="material-symbols-outlined leading-none" :class="layoutMode === 'story' ? 'text-[11px]' : 'text-sm'">stars</span>
                             <span>Astrological &amp; Calendar Factsheet</span>
                         </h3>

                         <!-- Single Age Profile View -->
                         <div x-show="mode === 'age'" class="grid" :class="layoutMode === 'story' ? 'grid-cols-2 gap-1.5' : 'grid-cols-1 sm:grid-cols-2 gap-4'">
                             <template x-for="card in [
                                 {icon:'event_repeat', label:'Day of Birth', val: result.birthDay},
                                 {icon:'star_half',    label:'Zodiac Sign',  val: result.zodiac},
                                 {icon:'calendar_today', label:'Leap Years', val: result.leapYears},
                                 {icon:'event_upcoming', label:'Half-Birthday', val: result.halfBirthday}
                             ]" :key="card.label">
                                 <div class="border flex items-center" :class="layoutMode === 'story' ? 'p-2 rounded-lg gap-2' : 'p-4 sm:p-5 rounded-xl gap-4'" :style="`border-color: ${customText}15; background-color: ${customText}03;`">
                                     <div class="border shrink-0" :class="layoutMode === 'story' ? 'p-1 rounded opacity-60' : 'p-3 rounded-lg opacity-80'" :style="`background-color: ${customText}08; border-color: ${customText}15;`">
                                         <span class="material-symbols-outlined block leading-none" :class="layoutMode === 'story' ? 'text-[11px]' : 'text-xl'" x-text="card.icon"></span>
                                     </div>
                                     <div class="min-w-0 flex-1 leading-tight">
                                         <div @click.stop="activeElement = 'factLabel'" :class="getTextClass('factLabel')" :style="getElementSize('factLabel') ? ('font-size: ' + getElementSize('factLabel')) : ''" class="uppercase font-bold font-sans opacity-50 block" :class="layoutMode === 'story' ? 'text-[6.5px] tracking-wide' : 'tracking-wider text-[10px]'" x-text="card.label"></div>
                                         <div @click.stop="activeElement = 'factValue'" :class="getTextClass('factValue')" :style="getElementSize('factValue') ? ('font-size: ' + getElementSize('factValue')) : ''" class="font-bold block" :class="layoutMode === 'story' ? 'text-[10px]' : 'text-base sm:text-xl'" x-text="card.val"></div>
                                     </div>
                                 </div>
                             </template>
                             <div x-show="result.nextBirthdayCountdown" class="col-span-full border flex items-center" :class="layoutMode === 'story' ? 'p-2 rounded-lg gap-2' : 'p-4 sm:p-5 rounded-xl gap-4'" :style="`border-color: ${customText}15; background-color: ${customText}05;`">
                                 <div class="border shrink-0" :class="layoutMode === 'story' ? 'p-1 rounded opacity-60' : 'p-3 rounded-lg opacity-80'" :style="`background-color: ${customText}08; border-color: ${customText}15;`">
                                     <span class="material-symbols-outlined block leading-none" :class="layoutMode === 'story' ? 'text-[11px]' : 'text-xl'">cake</span>
                                 </div>
                                 <div class="min-w-0 flex-1 leading-tight">
                                     <div @click.stop="activeElement = 'factLabel'" :class="getTextClass('factLabel')" :style="getElementSize('factLabel') ? ('font-size: ' + getElementSize('factLabel')) : ''" class="uppercase font-bold font-sans opacity-50 block" :class="layoutMode === 'story' ? 'text-[6.5px] tracking-wide' : 'tracking-wider text-[10px]'">Next Birthday Status</div>
                                     <div @click.stop="activeElement = 'factValue'" :class="getTextClass('factValue')" :style="getElementSize('factValue') ? ('font-size: ' + getElementSize('factValue')) : ''" class="font-bold block" :class="layoutMode === 'story' ? 'text-[10px]' : 'text-base sm:text-lg'" x-text="result.nextBirthdayCountdown"></div>
                                     <div class="opacity-60 leading-tight block" :class="layoutMode === 'story' ? 'text-[7.5px]' : 'text-xs mt-0.5'" x-text="'Celebration falls on a ' + result.nextBirthdayDay"></div>
                                 </div>
                             </div>
                         </div>

                         <!-- Difference Mode Profiles View (Side by Side comparison) -->
                         <template x-if="mode === 'diff'">
                             <div class="space-y-2 sm:space-y-6">
                                 <!-- Profile Summary Heading -->
                                 <div class="rounded-xl border text-center font-bold leading-tight" :class="layoutMode === 'story' ? 'p-1.5 text-[9.5px]' : 'p-4 text-sm sm:text-base'" :style="`border-color: ${customText}20; background-color: ${customText}05;`" x-text="result.comparisonText"></div>

                                 <div class="grid gap-2 sm:gap-6" :class="layoutMode === 'story' ? 'grid-cols-2' : 'grid-cols-1 sm:grid-cols-2'">
                                     <!-- Person 1 Column -->
                                     <div class="rounded-xl border" :class="layoutMode === 'story' ? 'p-2 space-y-1.5' : 'p-5 space-y-4'" :style="`border-color: ${customText}15; background-color: ${customText}02;`">
                                         <div class="font-bold uppercase tracking-wider border-b opacity-80 font-sans" :class="layoutMode === 'story' ? 'text-[8.5px] pb-0.5' : 'text-sm pb-2'" x-text="(p1Name || 'Person 1') + ' Facts'"></div>
                                         <div class="space-y-1 sm:space-y-2.5 leading-tight" :class="layoutMode === 'story' ? 'text-[8.5px]' : 'text-xs sm:text-sm'">
                                             <div class="flex justify-between border-b pb-0.5" :style="`border-color: ${customText}10;`">
                                                 <span class="opacity-60 uppercase font-bold text-[7.5px] sm:text-[10px] font-sans">Age</span>
                                                 <span class="font-bold text-right" x-text="result.p1AgeSummary"></span>
                                             </div>
                                             <div class="flex justify-between border-b pb-0.5" :style="`border-color: ${customText}10;`">
                                                 <span class="opacity-60 uppercase font-bold text-[7.5px] sm:text-[10px] font-sans">Day</span>
                                                 <span class="font-bold text-right" x-text="result.birthDay"></span>
                                             </div>
                                             <div class="flex justify-between border-b pb-0.5" :style="`border-color: ${customText}10;`">
                                                 <span class="opacity-60 uppercase font-bold text-[7.5px] sm:text-[10px] font-sans">Sign</span>
                                                 <span class="font-bold text-right" x-text="result.zodiac"></span>
                                             </div>
                                             <div class="flex justify-between border-b pb-0.5" :style="`border-color: ${customText}10;`">
                                                 <span class="opacity-60 uppercase font-bold text-[7.5px] sm:text-[10px] font-sans">Leap</span>
                                                 <span class="font-bold text-right" x-text="result.leapYears"></span>
                                             </div>
                                             <div class="flex justify-between">
                                                 <span class="opacity-60 uppercase font-bold text-[7.5px] sm:text-[10px] font-sans">Half</span>
                                                 <span class="font-bold text-right" x-text="result.halfBirthday"></span>
                                             </div>
                                         </div>
                                     </div>

                                     <!-- Person 2 Column -->
                                     <div class="rounded-xl border" :class="layoutMode === 'story' ? 'p-2 space-y-1.5' : 'p-5 space-y-4'" :style="`border-color: ${customText}15; background-color: ${customText}02;`">
                                         <div class="font-bold uppercase tracking-wider border-b opacity-80 font-sans" :class="layoutMode === 'story' ? 'text-[8.5px] pb-0.5' : 'text-sm pb-2'" x-text="(p2Name || 'Person 2') + ' Facts'"></div>
                                         <div class="space-y-1 sm:space-y-2.5 leading-tight" :class="layoutMode === 'story' ? 'text-[8.5px]' : 'text-xs sm:text-sm'">
                                             <div class="flex justify-between border-b pb-0.5" :style="`border-color: ${customText}10;`">
                                                 <span class="opacity-60 uppercase font-bold text-[7.5px] sm:text-[10px] font-sans">Age</span>
                                                 <span class="font-bold text-right" x-text="result.p2AgeSummary"></span>
                                             </div>
                                             <div class="flex justify-between border-b pb-0.5" :style="`border-color: ${customText}10;`">
                                                 <span class="opacity-60 uppercase font-bold text-[7.5px] sm:text-[10px] font-sans">Day</span>
                                                 <span class="font-bold text-right" x-text="result.p2BirthDay"></span>
                                             </div>
                                             <div class="flex justify-between border-b pb-0.5" :style="`border-color: ${customText}10;`">
                                                 <span class="opacity-60 uppercase font-bold text-[7.5px] sm:text-[10px] font-sans">Sign</span>
                                                 <span class="font-bold text-right" x-text="result.p2Zodiac"></span>
                                             </div>
                                             <div class="flex justify-between border-b pb-0.5" :style="`border-color: ${customText}10;`">
                                                 <span class="opacity-60 uppercase font-bold text-[7.5px] sm:text-[10px] font-sans">Leap</span>
                                                 <span class="font-bold text-right" x-text="result.p2LeapYears"></span>
                                             </div>
                                             <div class="flex justify-between">
                                                 <span class="opacity-60 uppercase font-bold text-[7.5px] sm:text-[10px] font-sans">Half</span>
                                                 <span class="font-bold text-right" x-text="result.p2HalfBirthday"></span>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </template>

                         <!-- Extra Story Data Section: Chronos Life Stories Snapshot -->
                         <div x-show="layoutMode === 'story'" class="mt-2 border p-2 rounded-xl space-y-1.5" :style="`border-color: ${customText}15; background-color: ${customText}02;`">
                             <div class="flex justify-between items-center border-b pb-1 font-sans" :style="`border-color: ${customText}10;`">
                                 <span @click.stop="activeElement = 'chronicleTitle'" :class="getTextClass('chronicleTitle')" :style="getElementSize('chronicleTitle') ? ('font-size: ' + getElementSize('chronicleTitle')) : ''" class="font-bold uppercase opacity-65 text-[7px] tracking-wide flex items-center gap-1">
                                     <span class="material-symbols-outlined text-[10px]">auto_stories</span>
                                     <span x-text="(p1Name || (mode === 'diff' ? 'Comparative' : 'Life')) + ' Chronicles'"></span>
                                 </span>
                                 <span class="text-[7.5px] opacity-75 italic">Pulse Gauge: <strong x-text="result.story?.battery + '%'"></strong></span>
                             </div>
                             <!-- Compact Battery Pulse Gauge -->
                             <div class="h-1.5 w-full rounded-full overflow-hidden bg-black/5 border" :style="`border-color: ${customText}15;`">
                                 <div class="h-full transition-all duration-1000" :style="`width: ${result.story?.battery || 0}%; background-color: ${customText}; opacity: 0.8;`"></div>
                             </div>
                             <!-- Engaging Narrative Preview -->
                             <div @click.stop="activeElement = 'chronicleText'" :class="getTextClass('chronicleText')" :style="getElementSize('chronicleText') ? ('font-size: ' + getElementSize('chronicleText')) : ''" class="text-[8px] opacity-90 leading-tight italic font-medium line-clamp-2 block" x-text="storyText.battery || storyText.weeks || 'Mapping untold milestones and cosmic trajectory across your individual lifetime journey.'"></div>
                         </div>
                     </div>

                     <!-- SECTION 5: Historical Context ("A Glimpse Into The Past") -->
                     <div class="mb-12" x-show="layoutMode === 'document'">
                         <h3 class="text-xs sm:text-sm font-bold uppercase tracking-widest opacity-60 mb-4 border-b pb-2 flex items-center gap-2 font-sans" :style="`border-color: ${customText}15;`">
                             <span class="material-symbols-outlined text-sm">history_edu</span>
                             Historical Milestones On Your Day of Birth
                         </h3>

                         <div class="space-y-4">
                             <!-- Person 1 History Block -->
                             <div class="p-5 rounded-xl border relative" :style="`border-color: ${customText}15; background-color: ${customText}03;`">
                                 <div class="text-[10px] uppercase tracking-wider opacity-60 font-bold mb-2 flex items-center gap-1.5">
                                     <span class="material-symbols-outlined text-xs">auto_stories</span>
                                     <span x-text="mode === 'diff' ? (p1Name || 'Person 1') + '\'s Birth Epoch' : 'On This Day in History'"></span>
                                 </div>
                                 
                                 <div x-show="p1HistoryLoading" class="opacity-60 italic text-xs py-2">Discovering chronicled planetary archives...</div>
                                 <blockquote x-show="!p1HistoryLoading" class="italic text-xs sm:text-base leading-relaxed font-normal opacity-90 border-l-2 pl-4 py-1" :style="`border-color: ${customText}40;`" x-text="result.p1History || 'A significant chapter occurred across human enterprise on this date.'"></blockquote>
                             </div>

                             <!-- Person 2 History Block (Difference Mode) -->
                             <template x-if="mode === 'diff'">
                                 <div class="p-5 rounded-xl border relative" :style="`border-color: ${customText}15; background-color: ${customText}03;`">
                                     <div class="text-[10px] uppercase tracking-wider opacity-60 font-bold mb-2 flex items-center gap-1.5">
                                         <span class="material-symbols-outlined text-xs">auto_stories</span>
                                         <span x-text="(p2Name || 'Person 2') + '\'s Birth Epoch'"></span>
                                     </div>

                                     <div x-show="p2HistoryLoading" class="opacity-60 italic text-xs py-2">Discovering chronicled planetary archives...</div>
                                     <blockquote x-show="!p2HistoryLoading" class="italic text-xs sm:text-base leading-relaxed font-normal opacity-90 border-l-2 pl-4 py-1" :style="`border-color: ${customText}40;`" x-text="result.p2History || 'A significant chapter occurred across human enterprise on this date.'"></blockquote>
                                 </div>
                             </template>
                         </div>
                     </div>

                     <!-- SECTION 6: Chronos Life Storyteller (Narrative Engine) -->
                     <div class="mb-6" x-show="layoutMode === 'document'">
                         <h3 class="text-xs sm:text-sm font-bold uppercase tracking-widest opacity-60 mb-4 border-b pb-2 flex items-center gap-2 font-sans" :style="`border-color: ${customText}15;`">
                             <span class="material-symbols-outlined text-sm">auto_stories</span>
                             Chronos Life Storyteller Narratives
                         </h3>

                         <div class="space-y-8">
                             <!-- Person 1 Narrative Block -->
                             <div class="p-6 rounded-xl border space-y-4" :style="`border-color: ${customText}15; background-color: ${customText}02;`">
                                 <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 border-b pb-3" :style="`border-color: ${customText}10;`">
                                     <div class="font-bold text-sm uppercase tracking-wider opacity-85 flex items-center gap-2">
                                         <span class="p-1.5 rounded border text-[10px]" :style="`background-color: ${customText}05; border-color: ${customText}15;`">P1</span>
                                         <span x-text="(p1Name || (mode === 'diff' ? 'Person 1' : 'Your Life')) + ' Chronicles'"></span>
                                     </div>
                                     <div class="text-xs opacity-75 italic">Life Span Pulse Gauge: <strong x-text="result.story?.battery + '%'"></strong></div>
                                 </div>

                                 <!-- Battery Visualization Gauge -->
                                 <div class="h-2 w-full rounded-full overflow-hidden border" :style="`background-color: ${customText}10; border-color: ${customText}20;`">
                                     <div class="h-full transition-all duration-1000" :style="`width: ${result.story?.battery || 0}%; background-color: ${customText}; opacity: 0.8;`"></div>
                                 </div>

                                 <ul class="space-y-3 text-xs sm:text-sm opacity-90 list-disc pl-5 leading-relaxed font-normal">
                                     <li x-show="storyText.battery" x-text="storyText.battery"></li>
                                     <li x-show="storyText.weeks" x-text="storyText.weeks"></li>
                                     <li x-show="storyText.engine" x-text="storyText.engine"></li>
                                     <li x-show="storyText.sleep" x-text="storyText.sleep"></li>
                                     <li x-show="storyText.cosmic" x-text="storyText.cosmic"></li>
                                 </ul>
                             </div>

                             <!-- Person 2 Narrative Block (Difference Mode) -->
                             <template x-if="mode === 'diff'">
                                 <div class="p-6 rounded-xl border space-y-4" :style="`border-color: ${customText}15; background-color: ${customText}02;`">
                                     <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 border-b pb-3" :style="`border-color: ${customText}10;`">
                                         <div class="font-bold text-sm uppercase tracking-wider opacity-85 flex items-center gap-2">
                                             <span class="p-1.5 rounded border text-[10px]" :style="`background-color: ${customText}05; border-color: ${customText}15;`">P2</span>
                                             <span x-text="(p2Name || 'Person 2') + ' Chronicles'"></span>
                                         </div>
                                         <div class="text-xs opacity-75 italic">Life Span Pulse Gauge: <strong x-text="result.p2Story?.battery + '%'"></strong></div>
                                     </div>

                                     <!-- Battery Visualization Gauge P2 -->
                                     <div class="h-2 w-full rounded-full overflow-hidden border" :style="`background-color: ${customText}10; border-color: ${customText}20;`">
                                         <div class="h-full transition-all duration-1000" :style="`width: ${result.p2Story?.battery || 0}%; background-color: ${customText}; opacity: 0.8;`"></div>
                                     </div>

                                     <ul class="space-y-3 text-xs sm:text-sm opacity-90 list-disc pl-5 leading-relaxed font-normal">
                                         <li x-show="p2StoryText.battery" x-text="p2StoryText.battery"></li>
                                         <li x-show="p2StoryText.weeks" x-text="p2StoryText.weeks"></li>
                                         <li x-show="p2StoryText.engine" x-text="p2StoryText.engine"></li>
                                         <li x-show="p2StoryText.sleep" x-text="p2StoryText.sleep"></li>
                                         <li x-show="p2StoryText.cosmic" x-text="p2StoryText.cosmic"></li>
                                     </ul>
                                 </div>
                             </template>
                         </div>
                     </div>

                     <!-- Footer Stamp -->
                     <div @click.stop="activeElement = 'footerText'" :class="getTextClass('footerText')" :style="getElementSize('footerText') ? ('font-size: ' + getElementSize('footerText')) : ''" class="border-t text-center w-full block" :class="layoutMode === 'story' ? 'pt-1.5' : 'mt-12 pt-6 space-y-1.5'" :style="`border-color: ${customText}15;`">
                         <div class="font-extrabold opacity-85 leading-tight block" :class="layoutMode === 'story' ? 'text-[7px]' : 'text-xs sm:text-sm tracking-wide'" x-text="mode === 'age' ? '✨ Fascinated? Discover your own milestones!' : '✨ Map your relationship timeline!'"></div>
                         <div class="font-bold uppercase opacity-50 leading-tight block" :class="layoutMode === 'story' ? 'text-[6px]' : 'tracking-widest text-[10px] sm:text-xs'">
                             Get yours at <strong class="underline font-mono">{{ url('/') }}</strong>
                         </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
    function exportStudio() {
        return {
            mode: 'age',
            layoutMode: 'document',
            p1Name: '',
            p2Name: '',
            dob: '',
            targetDate: '{{ date('Y-m-d') }}',
            customBg: '#ffffff',
            customText: '#111827',
            customFont: 'font-montserrat',
            customBorder: 'border-none',
            customBorderColor: '#cbd5e1',
            p1HistoryLoading: false,
            p2HistoryLoading: false,
            activeElement: null,
            fontSizes: {
                certHeader: null,
                mainTitle: null,
                mainSubtitle: null,
                metricLabel: null,
                metricNumbers: null,
                metricUnits: null,
                metricSubtext: null,
                factTitle: null,
                factLabel: null,
                factValue: null,
                chronicleTitle: null,
                chronicleText: null,
                footerText: null
            },
            elementLabels: {
                certHeader: 'Top Certificate Type',
                mainTitle: 'Main Report Heading',
                mainSubtitle: 'Person Names / Subtitle',
                metricLabel: 'Primary Time Metric Label',
                metricNumbers: 'Master Calculated Numbers',
                metricUnits: 'Unit Indicators (Years/Months)',
                metricSubtext: 'Calculation Target Date Subtext',
                factTitle: 'Factsheet Section Title',
                factLabel: 'Fact Card Label Keys',
                factValue: 'Fact Card Metric Values',
                chronicleTitle: 'Narrative/Chronicles Title',
                chronicleText: 'Narrative Preview Text',
                footerText: 'Footer Branding & Links'
            },
            defaultSizes: {
                certHeader: 10, mainTitle: 48, mainSubtitle: 16,
                metricLabel: 12, metricNumbers: 64, metricUnits: 16, metricSubtext: 14,
                factTitle: 14, factLabel: 10, factValue: 18,
                chronicleTitle: 14, chronicleText: 13, footerText: 12
            },
            storyDefaultSizes: {
                certHeader: 7.5, mainTitle: 22, mainSubtitle: 11,
                metricLabel: 7.5, metricNumbers: 26, metricUnits: 11, metricSubtext: 8.5,
                factTitle: 7.5, factLabel: 6.5, factValue: 10,
                chronicleTitle: 7, chronicleText: 8, footerText: 7
            },
            getElementSize(key) {
                return this.fontSizes[key] !== null ? `${this.fontSizes[key]}px` : '';
            },
            getCurrentAdjustSize(key) {
                if (this.fontSizes[key] !== null) return this.fontSizes[key];
                return this.layoutMode === 'story' ? this.storyDefaultSizes[key] : this.defaultSizes[key];
            },
            adjustFontSize(delta) {
                if (!this.activeElement) return;
                let current = this.getCurrentAdjustSize(this.activeElement);
                this.fontSizes[this.activeElement] = Math.max(5, current + delta);
            },
            setFontSize(val) {
                if (!this.activeElement) return;
                this.fontSizes[this.activeElement] = Number(val);
            },
            resetElementSize() {
                if (!this.activeElement) return;
                this.fontSizes[this.activeElement] = null;
            },
            resetAllFontSizes() {
                Object.keys(this.fontSizes).forEach(k => this.fontSizes[k] = null);
                this.activeElement = null;
            },
            getTextClass(key) {
                return this.activeElement === key 
                    ? 'ring-2 ring-primary ring-offset-1 rounded cursor-pointer transition-all select-none' 
                    : 'hover:ring-1 hover:ring-outline-variant/50 rounded cursor-pointer transition-all select-none';
            },
            result: {
                years: 0, months: 0, days: 0, hours: 0, minutes: 0, seconds: 0,
                totalMonths: 0, totalWeeks: 0, totalDays: 0, totalHours: 0, totalMinutes: 0, totalSeconds: 0,
                birthDay: '', nextBirthdayCountdown: '', nextBirthdayDay: '', halfBirthday: '', p2HalfBirthday: '',
                p1History: '', p2History: '', zodiac: '', p2Zodiac: '', leapYears: 0,
                comparisonText: '', p1AgeSummary: '', p2AgeSummary: '', p2BirthDay: '', p2LeapYears: 0,
                story: { battery: 0, weeksLived: 0, weeksLeft: 0, heartbeats: 0, breaths: 0, yearsSleeping: 0, cosmicMiles: 0 },
                p2Story: { battery: 0, weeksLived: 0, weeksLeft: 0, heartbeats: 0, breaths: 0, yearsSleeping: 0, cosmicMiles: 0 }
            },
            storyText: { battery: '', weeks: '', engine: '', sleep: '', cosmic: '' },
            p2StoryText: { battery: '', weeks: '', engine: '', sleep: '', cosmic: '' },
            narratives: {
                battery: [
                    "Your life battery is at {val}%. The best chapters are yet to be written.",
                    "At {val}%, you've gathered enough energy to power a small city of memories.",
                    "You've successfully charged {val}% of your existence. What's next?",
                    "Your soul's battery is at {val}%. Use the remaining power for things that set you on fire.",
                    "At {val}% capacity, you've already experienced more than most explorers in history.",
                    "Your internal clock shows {val}% progress. Every percent is a collection of triumphs.",
                    "The battery of your life is at {val}%. Don't just count the percent, make the percent count.",
                    "You've used {val}% of your available time. It's been an incredible journey so far.",
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
                    "At {val}%, you are perfectly positioned for your next big breakthrough."
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
                    "You have {val} weeks left to see the world, love deeply, and laugh often."
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
                    "Your heart has worked for you {val} times today and every day before."
                ],
                sleep: [
                    "You've spent {val} years in the world of dreams. Rest is your superpower.",
                    "Out of your life, {val} years were dedicated to the healing art of sleep.",
                    "You've spent {val} years recharging your soul in the quiet of the night.",
                    "The dreamland has been your home for {val} years. What secrets did you find?",
                    "Rest has claimed {val} years of your journey, preparing you for every waking moment.",
                    "You've spent {val} years horizontal, letting your body rebuild its magic.",
                    "Sleep has been your silent companion for {val} years of your existence.",
                    "You've traveled through the subconscious for {val} years. A true dream explorer."
                ],
                cosmic: [
                    "You've traveled {val} miles through the galaxy without ever leaving your seat.",
                    "The Earth has carried you {val} miles on its eternal dance around the Sun.",
                    "You are a celestial voyager, having covered {val} miles in the cosmic ocean.",
                    "Your cosmic odometer reads {val} miles. You've seen more of space than you realize.",
                    "In the grand orbit of life, you've glided through {val} miles of star-dusted space.",
                    "You've crossed {val} miles of the solar system. A true citizen of the universe.",
                    "Your journey through the void has already spanned {val} miles. Keep soaring.",
                    "You are a passenger on a planet that has moved you {val} miles since birth."
                ]
            },

            applyPreset(bg, text, font, border, borderColor = null) {
                this.customBg = bg;
                this.customText = text;
                this.customFont = font;
                this.customBorder = border;
                this.customBorderColor = borderColor || text;
            },

            countLeapYears(start, end) {
                let count = 0;
                const startYear = start.getFullYear();
                const endYear = end.getFullYear();
                for (let y = startYear; y <= endYear; y++) {
                    if ((y % 4 === 0 && y % 100 !== 0) || (y % 400 === 0)) {
                        const leapDay = new Date(y, 1, 29);
                        if (leapDay >= start && leapDay <= end) count++;
                    }
                }
                return count;
            },

            getDiff(d1, d2) {
                let start = d1 < d2 ? d1 : d2;
                let end = d1 < d2 ? d2 : d1;
                let years = end.getFullYear() - start.getFullYear();
                let months = end.getMonth() - start.getMonth();
                let days = end.getDate() - start.getDate();
                if (days < 0) { months--; const prevMonth = new Date(end.getFullYear(), end.getMonth(), 0); days += prevMonth.getDate(); }
                if (months < 0) { years--; months += 12; }
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

            getZodiac(day, month) {
                const signs = ["Capricorn", "Aquarius", "Pisces", "Aries", "Taurus", "Gemini", "Cancer", "Leo", "Virgo", "Libra", "Scorpio", "Sagittarius"];
                const last_day = [19, 18, 20, 19, 20, 20, 22, 22, 22, 22, 21, 21];
                return (day > last_day[month]) ? signs[(month + 1) % 12] : signs[month];
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
                if (story && story.battery) {
                    this.storyText.battery = this.getStoryNarrative('battery', { val: story.battery });
                    this.storyText.weeks = this.getStoryNarrative('weeks', { val: story.weeksLeft, lived: story.weeksLived });
                    this.storyText.engine = this.getStoryNarrative('engine', { val: story.heartbeats, breaths: story.breaths });
                    this.storyText.sleep = this.getStoryNarrative('sleep', { val: story.yearsSleeping });
                    this.storyText.cosmic = this.getStoryNarrative('cosmic', { val: story.cosmicMiles, years: years });
                }
                if (this.mode === 'diff' && this.result.p2Story && this.result.p2Story.battery) {
                    const p2 = this.result.p2Story;
                    this.p2StoryText.battery = this.getStoryNarrative('battery', { val: p2.battery });
                    this.p2StoryText.weeks = this.getStoryNarrative('weeks', { val: p2.weeksLeft, lived: p2.weeksLived });
                    this.p2StoryText.engine = this.getStoryNarrative('engine', { val: p2.heartbeats, breaths: p2.breaths });
                    this.p2StoryText.sleep = this.getStoryNarrative('sleep', { val: p2.yearsSleeping });
                    this.p2StoryText.cosmic = this.getStoryNarrative('cosmic', { val: p2.cosmicMiles, years: this.result.p2AgeSummary?.split('y')[0] || 0 });
                }
            },

            async fetchHistory(dateStr, person) {
                if (!dateStr) return;
                const loadingProp = person === 1 ? 'p1HistoryLoading' : 'p2HistoryLoading';
                this[loadingProp] = true;
                const d = new Date(dateStr);
                const month = d.getMonth() + 1;
                const day = d.getDate();
                try {
                    const response = await fetch(`/api/history/${month}/${day}`);
                    const data = await response.json();
                    this[loadingProp] = false;
                    if (person === 1) this.result.p1History = data.text;
                    else this.result.p2History = data.text;
                } catch (e) {
                    this[loadingProp] = false;
                    const backupText = "On this historical day, profound scientific, cultural, and political strides catalyzed milestones that shaped the trajectory of civilization globally.";
                    if (person === 1) this.result.p1History = backupText;
                    else this.result.p2History = backupText;
                }
            },

            updateCalculation() {
                if (!this.dob) return;
                const now = new Date();
                const d1 = new Date(this.dob + 'T00:00:00');
                const d2 = this.mode === 'age' ? new Date(this.targetDate + (this.targetDate === now.toISOString().split('T')[0] ? 'T' + now.toTimeString().split(' ')[0] : 'T23:59:59')) : new Date(this.targetDate + 'T00:00:00');
                if (this.mode === 'age') {
                    const diff = this.getDiff(d1, d2);
                    const birthDay = d1.toLocaleDateString('en-US', { weekday: 'long' });
                    const leapYears = this.countLeapYears(d1, d2);
                    let nextBday = new Date(now.getFullYear(), d1.getMonth(), d1.getDate());
                    if (nextBday < now) nextBday.setFullYear(now.getFullYear() + 1);
                    const nextBirthdayDay = nextBday.toLocaleDateString('en-US', { weekday: 'long' });
                    const nbDiff = this.getDiff(now, nextBday);
                    let nextBirthdayCountdown = `${nbDiff.months} months and ${nbDiff.days} days left`;
                    if (nbDiff.totalDays === 0) nextBirthdayCountdown = "Today is your Birthday! 🎉";
                    let halfBday = new Date(d1);
                    halfBday.setMonth(halfBday.getMonth() + 6);
                    const halfBirthday = halfBday.toLocaleDateString('en-US', { month: 'long', day: 'numeric' });
                    this.result = { ...this.result, ...diff, birthDay, leapYears, nextBirthdayCountdown, nextBirthdayDay, comparisonText: '', halfBirthday, zodiac: this.getZodiac(d1.getDate(), d1.getMonth()), story: { battery: ((diff.totalDays / (80 * 365.25)) * 100).toFixed(1), weeksLived: Math.floor(diff.totalWeeks).toLocaleString(), weeksLeft: Math.max(0, Math.floor((80 * 52.17) - diff.totalWeeks)).toLocaleString(), heartbeats: (diff.totalMinutes * 80).toLocaleString(), breaths: (diff.totalMinutes * 16).toLocaleString(), yearsSleeping: (diff.years * 0.33).toFixed(1), cosmicMiles: (diff.years * 584000000).toLocaleString() } };
                } else {
                    const diff = this.getDiff(d1, d2);
                    const age1 = this.getDiff(d1, now);
                    const age2 = this.getDiff(d2, now);
                    const name1 = this.p1Name || 'Person 1';
                    const name2 = this.p2Name || 'Person 2';
                    let halfBday1 = new Date(d1); halfBday1.setMonth(halfBday1.getMonth() + 6);
                    let halfBday2 = new Date(d2); halfBday2.setMonth(halfBday2.getMonth() + 6);
                    this.result = { ...this.result, ...diff, comparisonText: d1 < d2 ? `${name1} is older than ${name2}` : (d1 > d2 ? `${name2} is older than ${name1}` : "Both share the identical age milestone"), p1AgeSummary: `${age1.years}y ${age1.months}m ${age1.days}d`, p2AgeSummary: `${age2.years}y ${age2.months}m ${age2.days}d`, birthDay: d1.toLocaleDateString('en-US', { weekday: 'long' }), p2BirthDay: d2.toLocaleDateString('en-US', { weekday: 'long' }), leapYears: this.countLeapYears(d1, now), p2LeapYears: this.countLeapYears(d2, now), halfBirthday: halfBday1.toLocaleDateString('en-US', { month: 'long', day: 'numeric' }), p2HalfBirthday: halfBday2.toLocaleDateString('en-US', { month: 'long', day: 'numeric' }), zodiac: this.getZodiac(d1.getDate(), d1.getMonth()), p2Zodiac: this.getZodiac(d2.getDate(), d2.getMonth()), story: { battery: ((age1.totalDays / (80 * 365.25)) * 100).toFixed(1), weeksLived: Math.floor(age1.totalWeeks).toLocaleString(), weeksLeft: Math.max(0, Math.floor((80 * 52.17) - age1.totalWeeks)).toLocaleString(), heartbeats: (age1.totalMinutes * 80).toLocaleString(), breaths: (age1.totalMinutes * 16).toLocaleString(), yearsSleeping: (age1.years * 0.33).toFixed(1), cosmicMiles: (age1.years * 584000000).toLocaleString() }, p2Story: { battery: ((age2.totalDays / (80 * 365.25)) * 100).toFixed(1), weeksLived: Math.floor(age2.totalWeeks).toLocaleString(), weeksLeft: Math.max(0, Math.floor((80 * 52.17) - age2.totalWeeks)).toLocaleString(), heartbeats: (age2.totalMinutes * 80).toLocaleString(), breaths: (age2.totalMinutes * 16).toLocaleString(), yearsSleeping: (age2.years * 0.33).toFixed(1), cosmicMiles: (age2.years * 584000000).toLocaleString() } };
                }
            },

            updateUrl() {
                const params = new URLSearchParams();
                params.set('m', this.mode);
                if (this.p1Name) params.set('p1', this.p1Name);
                if (this.p2Name) params.set('p2', this.p2Name);
                if (this.dob) params.set('dob', this.dob);
                if (this.targetDate) params.set('td', this.targetDate);
                
                const newUrl = window.location.pathname + '?' + params.toString();
                window.history.replaceState({ path: newUrl }, '', newUrl);
            },

            onDataChange() {
                this.updateCalculation();
                this.updateUrl();
            },

            loadFromUrl() {
                const params = new URLSearchParams(window.location.search);
                if (params.has('m')) this.mode = params.get('m');
                if (params.has('p1')) this.p1Name = params.get('p1');
                if (params.has('p2')) this.p2Name = params.get('p2');
                if (params.has('dob')) this.dob = params.get('dob');
                if (params.has('td')) this.targetDate = params.get('td');
                
                // Fallback demonstration dataset if accessed naked
                if (!this.dob) {
                    const defaultDate = new Date();
                    defaultDate.setFullYear(defaultDate.getFullYear() - 28);
                    this.dob = defaultDate.toISOString().split('T')[0];
                    this.p1Name = 'Alexander';
                    if (this.mode === 'diff') {
                        const targetD = new Date();
                        targetD.setFullYear(targetD.getFullYear() - 25);
                        this.targetDate = targetD.toISOString().split('T')[0];
                        this.p2Name = 'Eleanor';
                    }
                }
                
                this.updateCalculation();
                this.generateStory();
                
                // Trigger full API historical fetches for loaded birthdates
                this.fetchHistory(this.dob, 1);
                if (this.mode === 'diff') {
                    this.fetchHistory(this.targetDate, 2);
                }

                // Live dynamic interval updater if in single age mode
                if (this.mode === 'age') {
                    setInterval(() => {
                        this.updateCalculation();
                    }, 1000);
                }
            },

            async downloadCustomResults(type = 'png') {
                this.activeElement = null;
                // Give browser layout a tiny moment to flush selection indicator styles before capture
                await new Promise(r => setTimeout(r, 20));

                const element = document.getElementById('preview-capture');
                
                const canvas = await html2canvas(element, {
                    backgroundColor: this.customBg,
                    scale: 2,
                    logging: false,
                    useCORS: true
                });

                const filenameSlug = this.mode === 'age' ? (this.p1Name || 'age') : (this.p1Name || 'relationship') + '-comparison';

                if (type === 'png') {
                    const link = document.createElement('a');
                    link.download = `certified-report-${filenameSlug}.png`;
                    link.href = canvas.toDataURL('image/png');
                    link.click();
                } else if (type === 'pdf') {
                    const { jsPDF } = window.jspdf;
                    const pdf = new jsPDF({
                        orientation: 'portrait',
                        unit: 'px',
                        format: [canvas.width / 2, canvas.height / 2]
                    });
                    pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, canvas.width / 2, canvas.height / 2);
                    pdf.save(`certified-report-${filenameSlug}.pdf`);
                }
            },

            init() {
                this.loadFromUrl();
            }
        }
    }
</script>

<style>
    [x-cloak] { display: none !important; }
    
    /* Dedicated Custom Designer Typography Classes */
    .font-montserrat { font-family: 'Montserrat', sans-serif; }
    .font-cinzel { font-family: 'Cinzel', serif; }
    .font-vibes { font-family: 'Great Vibes', cursive; font-size: 1.15em; }
    .font-playfair { font-family: 'Playfair Display', serif; }
    .font-alex { font-family: 'Alex Brush', cursive; font-size: 1.3em; }
    .font-space { font-family: 'Space Mono', monospace; }

    /* Decorative Certificate Border Frames */
    .border-zigzag {
        border: 10px solid var(--custom-border-color, currentColor);
        border-image: repeating-linear-gradient(45deg, var(--custom-border-color, currentColor), var(--custom-border-color, currentColor) 10px, transparent 10px, transparent 20px) 10;
    }
    .border-thick-stamp {
        border: 8px dotted var(--custom-border-color, currentColor);
        outline: 2px solid var(--custom-border-color, currentColor);
        outline-offset: -16px;
    }
    .border-dashed-elegant {
        border: 3px dashed var(--custom-border-color, currentColor);
        outline: 1px solid var(--custom-border-color, currentColor);
        outline-offset: 4px;
    }
</style>
@endpush

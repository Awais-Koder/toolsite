@extends('layouts.app')

@section('title', 'Contact Us - Time&Date Tools')

@section('content')
    <!-- Hero Banner -->
    <section class="-mx-gutter -mt-section-gap pt-24 pb-12 md:pt-32 md:pb-16 bg-surface">
        <div class="max-w-[1200px] mx-auto px-gutter text-center" data-reveal="fade-up">
            <span class="inline-block text-secondary font-label-caps text-label-caps tracking-widest uppercase mb-3">Get in Touch</span>
            <h1 class="font-display text-display text-on-surface mb-4">Contact Us</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">Have a question, feedback, or a suggestion for a new tool? We'd love to hear from you.</p>
        </div>
    </section>

    <div class="max-w-[1000px] mx-auto -mt-8">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-gutter">
            <!-- Left: Contact Info -->
            <div class="lg:col-span-2 space-y-6" data-reveal="fade-up" data-reveal-delay="100">
                <div class="bg-surface-container-lowest rounded-2xl shadow-card border border-outline-variant/40 p-7 space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-secondary/10 rounded-xl flex items-center justify-center text-secondary shrink-0">
                            <span class="material-symbols-outlined">email</span>
                        </div>
                        <div>
                            <h3 class="font-h3 text-on-surface mb-1">Email</h3>
                            <a href="mailto:support@toolsite.com" class="text-secondary font-semibold hover:underline">support@toolsite.com</a>
                            <p class="text-xs text-on-surface-variant mt-1">We typically respond within 24-48 hours.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-secondary/10 rounded-xl flex items-center justify-center text-secondary shrink-0">
                            <span class="material-symbols-outlined">schedule</span>
                        </div>
                        <div>
                            <h3 class="font-h3 text-on-surface mb-1">Response Time</h3>
                            <p class="text-on-surface-variant text-sm">Monday – Friday, 9AM – 6PM UTC</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-secondary/10 rounded-xl flex items-center justify-center text-secondary shrink-0">
                            <span class="material-symbols-outlined">public</span>
                        </div>
                        <div>
                            <h3 class="font-h3 text-on-surface mb-1">Global Reach</h3>
                            <p class="text-on-surface-variant text-sm">Serving users in 150+ countries worldwide.</p>
                        </div>
                    </div>
                </div>

                <!-- Feedback note -->
                <div class="bg-gradient-to-br from-secondary/5 to-primary-fixed/10 rounded-2xl border border-secondary/10 p-6" data-reveal="fade-up" data-reveal-delay="200">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="material-symbols-outlined text-secondary">bug_report</span>
                        <h4 class="font-h3 text-on-surface">Report a Bug</h4>
                    </div>
                    <p class="text-on-surface-variant text-sm leading-relaxed">
                        If you noticed a calculation error, please include the exact dates or parameters you used. It helps us investigate and fix issues quickly.
                    </p>
                </div>
            </div>

            <!-- Right: Form -->
            <div class="lg:col-span-3" data-reveal="fade-up" data-reveal-delay="200">
                <div class="bg-surface-container-lowest rounded-2xl shadow-card border border-outline-variant/40 p-7 sm:p-10">
                    <h2 class="font-h2 text-h2 text-on-surface mb-2">Send a Message</h2>
                    <p class="text-on-surface-variant mb-8">Fill out the form below and we'll get back to you as soon as possible.</p>

                    @if(session('success'))
                        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl flex items-center gap-3">
                            <span class="material-symbols-outlined text-green-500">check_circle</span>
                            <p class="text-sm font-medium">{{ session('success') }}</p>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="group">
                                <label class="block font-label-caps text-on-surface mb-2 text-xs uppercase tracking-wider">Your Name</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface-variant/50 text-lg">person</span>
                                    <input type="text" name="name" value="{{ old('name') }}" placeholder="John Doe" class="w-full rounded-xl border-outline-variant/50 focus:border-secondary focus:ring-2 focus:ring-secondary/20 h-13 pl-11 pr-4 text-on-surface bg-surface-container-low font-body-md border transition-all duration-200 hover:border-outline-variant @error('name') border-red-500 @enderror" required>
                                </div>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="group">
                                <label class="block font-label-caps text-on-surface mb-2 text-xs uppercase tracking-wider">Email Address</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface-variant/50 text-lg">mail</span>
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="john@example.com" class="w-full rounded-xl border-outline-variant/50 focus:border-secondary focus:ring-2 focus:ring-secondary/20 h-13 pl-11 pr-4 text-on-surface bg-surface-container-low font-body-md border transition-all duration-200 hover:border-outline-variant @error('email') border-red-500 @enderror" required>
                                </div>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block font-label-caps text-on-surface mb-2 text-xs uppercase tracking-wider">Subject</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface-variant/50 text-lg">subject</span>
                                <select name="subject" class="w-full rounded-xl border-outline-variant/50 focus:border-secondary focus:ring-2 focus:ring-secondary/20 h-13 pl-11 pr-4 text-on-surface bg-surface-container-low font-body-md border transition-all duration-200 hover:border-outline-variant appearance-none cursor-pointer @error('subject') border-red-500 @enderror">
                                    <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                                    <option value="Bug Report" {{ old('subject') == 'Bug Report' ? 'selected' : '' }}>Bug Report</option>
                                    <option value="Feature Request" {{ old('subject') == 'Feature Request' ? 'selected' : '' }}>Feature Request</option>
                                    <option value="Business Inquiry" {{ old('subject') == 'Business Inquiry' ? 'selected' : '' }}>Business Inquiry</option>
                                    <option value="Other" {{ old('subject') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface-variant pointer-events-none">expand_more</span>
                            </div>
                            @error('subject')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-label-caps text-on-surface mb-2 text-xs uppercase tracking-wider">Message</label>
                            <textarea name="message" rows="5" placeholder="Tell us what's on your mind..." class="w-full rounded-xl border-outline-variant/50 focus:border-secondary focus:ring-2 focus:ring-secondary/20 px-4 py-3 text-on-surface bg-surface-container-low font-body-md border transition-all duration-200 hover:border-outline-variant resize-none @error('message') border-red-500 @enderror" required>{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="group w-full sm:w-auto bg-secondary hover:bg-secondary-container text-on-secondary font-semibold py-3.5 px-10 rounded-xl transition-all duration-300 shadow-md hover:shadow-glow hover:-translate-y-0.5 flex items-center justify-center gap-2.5">
                            <span class="material-symbols-outlined transition-transform duration-300 group-hover:rotate-12">send</span>
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Contact Us - Time&Date Tools')

@section('content')
    <!-- Hero Banner -->
    <section class="-mx-gutter -mt-section-gap pt-24 pb-12 md:pt-32 md:pb-16 bg-gradient-to-br from-primary-container/30 via-background to-secondary-fixed/20 relative overflow-hidden">
        <div class="absolute inset-0 -z-10">
            <div class="absolute top-0 right-1/4 w-[500px] h-[500px] rounded-full bg-secondary/[0.06] blur-[100px]"></div>
        </div>
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

                    <form class="space-y-5" onsubmit="event.preventDefault(); alert('Thank you for your message! This is a demo form.');">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="group">
                                <label class="block font-label-caps text-on-surface mb-2 text-xs uppercase tracking-wider">Your Name</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface-variant/50 text-lg">person</span>
                                    <input type="text" placeholder="John Doe" class="w-full rounded-xl border-outline-variant/50 focus:border-secondary focus:ring-2 focus:ring-secondary/20 h-13 pl-11 pr-4 text-on-surface bg-surface-container-low font-body-md border transition-all duration-200 hover:border-outline-variant" required>
                                </div>
                            </div>
                            <div class="group">
                                <label class="block font-label-caps text-on-surface mb-2 text-xs uppercase tracking-wider">Email Address</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface-variant/50 text-lg">mail</span>
                                    <input type="email" placeholder="john@example.com" class="w-full rounded-xl border-outline-variant/50 focus:border-secondary focus:ring-2 focus:ring-secondary/20 h-13 pl-11 pr-4 text-on-surface bg-surface-container-low font-body-md border transition-all duration-200 hover:border-outline-variant" required>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block font-label-caps text-on-surface mb-2 text-xs uppercase tracking-wider">Subject</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface-variant/50 text-lg">subject</span>
                                <select class="w-full rounded-xl border-outline-variant/50 focus:border-secondary focus:ring-2 focus:ring-secondary/20 h-13 pl-11 pr-4 text-on-surface bg-surface-container-low font-body-md border transition-all duration-200 hover:border-outline-variant appearance-none cursor-pointer">
                                    <option>General Inquiry</option>
                                    <option>Bug Report</option>
                                    <option>Feature Request</option>
                                    <option>Business Inquiry</option>
                                    <option>Other</option>
                                </select>
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface-variant pointer-events-none">expand_more</span>
                            </div>
                        </div>

                        <div>
                            <label class="block font-label-caps text-on-surface mb-2 text-xs uppercase tracking-wider">Message</label>
                            <textarea rows="5" placeholder="Tell us what's on your mind..." class="w-full rounded-xl border-outline-variant/50 focus:border-secondary focus:ring-2 focus:ring-secondary/20 px-4 py-3 text-on-surface bg-surface-container-low font-body-md border transition-all duration-200 hover:border-outline-variant resize-none" required></textarea>
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

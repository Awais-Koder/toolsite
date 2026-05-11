@extends('layouts.app')

@section('title', 'Privacy Policy - Time&Date Tools')

@section('content')
    <!-- Hero Banner -->
    <section class="-mx-gutter -mt-section-gap pt-24 pb-12 md:pt-32 md:pb-16 bg-surface">
        <div class="max-w-[1200px] mx-auto px-gutter text-center" data-reveal="fade-up">
            <span class="inline-block text-secondary font-label-caps text-label-caps tracking-widest uppercase mb-3">Legal</span>
            <h1 class="font-display text-display text-on-surface mb-4">Privacy Policy</h1>
            <p class="text-on-surface-variant font-body-md">Last Updated: {{ date('F d, Y') }}</p>
        </div>
    </section>

    <div class="max-w-[800px] mx-auto -mt-8">
        <!-- Content -->
        <div class="bg-surface-container-lowest rounded-3xl shadow-card border border-outline-variant/40 p-8 md:p-12 space-y-10" data-reveal="fade-up" data-reveal-delay="100">
            <section id="introduction" class="scroll-mt-24">
                <span class="text-label-caps text-secondary font-semibold tracking-wider text-xs uppercase">Section 1</span>
                <h2 class="font-h2 text-h2 text-on-surface mt-2 mb-4">Introduction</h2>
                <p class="text-on-surface-variant font-body-md leading-relaxed">At Time&Date Tools, accessible from {{ url('/') }}, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Time&Date Tools and how we use it.</p>
            </section>

            <section id="log-files" class="scroll-mt-24 pt-8 border-t border-outline-variant/30">
                <span class="text-label-caps text-secondary font-semibold tracking-wider text-xs uppercase">Section 2</span>
                <h2 class="font-h2 text-h2 text-on-surface mt-2 mb-4">Log Files</h2>
                <p class="text-on-surface-variant font-body-md leading-relaxed">Time&Date Tools follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks.</p>
            </section>

            <section id="cookies" class="scroll-mt-24 pt-8 border-t border-outline-variant/30">
                <span class="text-label-caps text-secondary font-semibold tracking-wider text-xs uppercase">Section 3</span>
                <h2 class="font-h2 text-h2 text-on-surface mt-2 mb-4">Cookies and Web Beacons</h2>
                <p class="text-on-surface-variant font-body-md leading-relaxed">Like any other website, Time&Date Tools uses 'cookies'. These cookies are used to store information including visitors' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users' experience by customizing our web page content based on visitors' browser type and/or other information.</p>
            </section>

            <section id="advertising" class="scroll-mt-24 pt-8 border-t border-outline-variant/30">
                <span class="text-label-caps text-secondary font-semibold tracking-wider text-xs uppercase">Section 4</span>
                <h2 class="font-h2 text-h2 text-on-surface mt-2 mb-4">Google DoubleClick DART Cookie</h2>
                <p class="text-on-surface-variant font-body-md leading-relaxed">Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL – <a href="https://policies.google.com/technologies/ads" class="text-secondary hover:underline font-medium">https://policies.google.com/technologies/ads</a></p>
            </section>

            <section id="third-party" class="scroll-mt-24 pt-8 border-t border-outline-variant/30">
                <span class="text-label-caps text-secondary font-semibold tracking-wider text-xs uppercase">Section 5</span>
                <h2 class="font-h2 text-h2 text-on-surface mt-2 mb-4">Our Advertising Partners</h2>
                <p class="text-on-surface-variant font-body-md leading-relaxed mb-4">Some of advertisers on our site may use cookies and web beacons. Our advertising partners include:</p>
                <ul class="list-disc pl-6 text-on-surface-variant font-body-md space-y-2">
                    <li>Google</li>
                </ul>
                <p class="text-on-surface-variant font-body-md leading-relaxed mt-4">You may consult this list to find the Privacy Policy for each of the advertising partners of Time&Date Tools. Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on Time&Date Tools, which are sent directly to users' browser.</p>
            </section>

            <section id="consent" class="scroll-mt-24 pt-8 border-t border-outline-variant/30">
                <span class="text-label-caps text-secondary font-semibold tracking-wider text-xs uppercase">Section 6</span>
                <h2 class="font-h2 text-h2 text-on-surface mt-2 mb-4">Consent</h2>
                <p class="text-on-surface-variant font-body-md leading-relaxed">By using our website, you hereby consent to our Privacy Policy and agree to its Terms and Conditions.</p>
            </section>
        </div>
    </div>
@endsection

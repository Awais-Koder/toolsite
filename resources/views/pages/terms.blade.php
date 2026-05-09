@extends('layouts.app')

@section('title', 'Terms of Service - Time&Date Tools')

@section('content')
<div class="max-w-[800px] mx-auto bg-surface-container-lowest p-stack-lg rounded-xl border border-outline-variant space-y-stack-md">
    <h1 class="font-display text-display text-on-surface">Terms of Service</h1>
    <p class="text-on-surface-variant italic">Last Updated: {{ date('F d, Y') }}</p>

    <section class="space-y-4 text-on-surface-variant">
        <h2 class="font-h2 text-h2 text-on-surface mt-stack-md">1. Terms</h2>
        <p>By accessing the website at <a href="{{ url('/') }}" class="text-secondary hover:underline">{{ url('/') }}</a>, you are agreeing to be bound by these terms of service, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws.</p>
        
        <h2 class="font-h2 text-h2 text-on-surface mt-stack-md">2. Use License</h2>
        <p>Permission is granted to temporarily use the tools and calculators on Time&Date Tools' website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title.</p>

        <h2 class="font-h2 text-h2 text-on-surface mt-stack-md">3. Disclaimer</h2>
        <p>The materials on Time&Date Tools' website are provided on an 'as is' basis. Time&Date Tools makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</p>
        <p>Further, Time&Date Tools does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its website or otherwise relating to such materials or on any sites linked to this site.</p>

        <h2 class="font-h2 text-h2 text-on-surface mt-stack-md">4. Limitations</h2>
        <p>In no event shall Time&Date Tools or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on Time&Date Tools' website.</p>

        <h2 class="font-h2 text-h2 text-on-surface mt-stack-md">5. Accuracy of Materials</h2>
        <p>The materials appearing on Time&Date Tools' website could include technical, typographical, or photographic errors. Time&Date Tools does not warrant that any of the materials on its website are accurate, complete or current.</p>
    </section>
</div>
@endsection

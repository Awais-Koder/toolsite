@extends('layouts.app')

@section('title', 'Contact Us - Time&Date Tools')

@section('content')
<div class="max-w-[800px] mx-auto bg-surface-container-lowest p-stack-lg rounded-xl border border-outline-variant space-y-stack-md">
    <h1 class="font-display text-display text-on-surface">Contact Us</h1>
    
    <section class="space-y-4 text-on-surface-variant">
        <p>Have a question, feedback, or a suggestion for a new tool? We'd love to hear from you!</p>
        
        <div class="bg-surface-container-low p-stack-md rounded-lg border border-outline-variant">
            <h2 class="font-h3 text-h3 text-on-surface mb-2">Get in Touch</h2>
            <p>You can reach us at:</p>
            <p class="font-h2 text-h2 text-secondary font-bold">support@@toolsite.com</p>
            <p class="mt-4 opacity-70 italic text-body-md">We typically respond to all inquiries within 24-48 business hours.</p>
        </div>

        <h2 class="font-h2 text-h2 text-on-surface mt-stack-md">Feedback</h2>
        <p>If you noticed a bug or a calculation error, please let us know. Providing the exact dates or parameters you used will help us investigate and fix the issue quickly.</p>
    </section>
</div>
@endsection

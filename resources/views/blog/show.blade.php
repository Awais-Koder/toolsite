@extends('layouts.app')

@section('title', $post->getSeoTitle() . ' | Time & Date Tools Blog')
@section('meta_description', $post->getSeoDescription())

@push('head')
<script type="application/ld+json">
{
  "{{ '@' }}context": "https://schema.org",
  "{{ '@' }}type": "BreadcrumbList",
  "itemListElement": [
    {
      "{{ '@' }}type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "{{ url('/') }}"
    },
    {
      "{{ '@' }}type": "ListItem",
      "position": 2,
      "name": "Blog",
      "item": "{{ route('blog.index') }}"
    },
    {
      "{{ '@' }}type": "ListItem",
      "position": 3,
      "name": "{{ $post->title }}",
      "item": "{{ route('blog.show', $post->slug) }}"
    }
  ]
}
</script>
<script type="application/ld+json">
{
  "{{ '@' }}context": "https://schema.org",
  "{{ '@' }}type": "Article",
  "headline": "{{ $post->title }}",
  "description": "{{ $post->getSeoDescription() }}",
  "image": "{{ $post->featured_image ? asset('storage/' . $post->featured_image) : asset('favicon.svg') }}",
  "author": {
    "{{ '@' }}type": "Person",
    "name": "{{ $post->user->name }}"
  },
  "publisher": {
    "{{ '@' }}type": "Organization",
    "name": "Time&Date Tools",
    "logo": {
      "{{ '@' }}type": "ImageObject",
      "url": "{{ asset('favicon.svg') }}"
    }
  },
  "datePublished": "{{ $post->published_at->toIso8601String() }}",
  "dateModified": "{{ $post->updated_at->toIso8601String() }}"
}
</script>
@endpush

@section('content')
    <article class="max-w-4xl mx-auto space-y-12">
        <!-- Header -->
        <header class="space-y-6" data-reveal="fade-up">
            <div class="flex items-center gap-4">
                @if($post->category)
                <a href="#" class="text-[11px] font-label-caps text-secondary bg-secondary/10 px-3 py-1.5 rounded-full uppercase tracking-wider hover:bg-secondary/20 transition-colors">
                    {{ $post->category->name }}
                </a>
                @endif
                <span class="text-[11px] font-label-caps text-on-surface-variant/60 uppercase tracking-wider">
                    {{ $post->published_at->format('F d, Y') }}
                </span>
            </div>
            
            <h1 class="font-display text-[44px] md:text-[56px] text-on-surface leading-[1.1] tracking-tight">
                {{ $post->title }}
            </h1>
            
            <div class="flex items-center gap-4 pt-4 border-t border-outline-variant/30">
                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold">
                    {{ substr($post->user->name, 0, 1) }}
                </div>
                <div>
                    <p class="text-sm font-semibold text-on-surface leading-tight">{{ $post->user->name }}</p>
                    <p class="text-xs text-on-surface-variant">Author & Time Enthusiast</p>
                </div>
            </div>
        </header>

        <!-- Featured Image -->
        @if($post->featured_image)
        <div class="rounded-3xl overflow-hidden shadow-xl" data-reveal="fade-up" data-reveal-delay="100">
            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover max-h-[500px]">
        </div>
        @endif

        <!-- Content -->
        <div class="prose prose-lg max-w-none prose-slate prose-headings:font-display prose-headings:text-on-surface prose-p:text-on-surface-variant prose-p:leading-relaxed prose-a:text-secondary prose-strong:text-on-surface" data-reveal="fade-up" data-reveal-delay="200">
            {!! nl2br(e($post->body)) !!}
        </div>

        <!-- Footer -->
        <footer class="pt-12 border-t border-outline-variant/30" data-reveal="fade-up">
            <div class="bg-surface-container-low rounded-2xl p-8 flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <h4 class="font-h3 text-on-surface mb-2">Enjoyed this article?</h4>
                    <p class="text-on-surface-variant text-sm">Explore more tools and calculators on our homepage.</p>
                </div>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 bg-primary text-on-primary px-6 py-3 rounded-xl font-h3 text-sm hover:bg-primary/90 transition-all">
                    View All Tools
                </a>
            </div>
        </footer>
    </article>
@endsection

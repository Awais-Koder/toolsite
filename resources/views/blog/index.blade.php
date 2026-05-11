@extends('layouts.app')

@section('title', 'Blog - Time & Date Insights, Tips, and Tools')
@section('meta_description', 'Read our latest insights on time management, productivity, and the science of calendars. Stay updated with new tools and features on Time&Date Tools.')

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
    }
  ]
}
</script>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="-mx-gutter -mt-section-gap pt-24 pb-16 md:pt-32 md:pb-24">
        <div class="max-w-[1200px] mx-auto px-gutter relative text-center">
            <div data-reveal="fade-up">
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-secondary/10 text-secondary font-label-caps text-label-caps border border-secondary/20 shadow-xs mb-6">
                    <span class="w-2 h-2 rounded-full bg-secondary"></span>
                    Latest Insights
                </span>
            </div>
            <h1 class="font-display text-display text-on-surface mb-6 leading-[1.05]" data-reveal="fade-up" data-reveal-delay="80">
                Time &amp; Date <span class="text-secondary">Blog</span>
            </h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed max-w-2xl mx-auto" data-reveal="fade-up" data-reveal-delay="160">
                Exploring the science of calendars, productivity hacks, and deep dives into the tools that help you manage your most precious resource.
            </p>
        </div>
    </section>

    <!-- Blog Grid -->
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($posts as $post)
        <article class="group bg-surface-container-lowest rounded-3xl border border-outline-variant/40 shadow-xs hover:shadow-card-hover hover:-translate-y-1 transition-all duration-500 overflow-hidden flex flex-col" data-reveal="fade-up" data-reveal-delay="{{ $loop->index * 50 }}">
            @if($post->featured_image)
            <div class="aspect-video overflow-hidden">
                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
            </div>
            @else
            <div class="aspect-video bg-surface-container-low flex items-center justify-center text-secondary/20">
                <span class="material-symbols-outlined text-6xl">article</span>
            </div>
            @endif
            
            <div class="p-8 flex flex-col flex-grow">
                <div class="flex items-center gap-3 mb-4">
                    @if($post->category)
                    <span class="text-[10px] font-label-caps text-secondary bg-secondary/10 px-2.5 py-1 rounded-full uppercase tracking-wider">
                        {{ $post->category->name }}
                    </span>
                    @endif
                    <span class="text-[10px] font-label-caps text-on-surface-variant/60 uppercase tracking-wider">
                        {{ $post->published_at->format('M d, Y') }}
                    </span>
                </div>
                
                <h2 class="font-h2 text-h2 text-on-surface mb-4 line-clamp-2 group-hover:text-secondary transition-colors">
                    <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                </h2>
                
                <p class="text-on-surface-variant text-sm leading-relaxed line-clamp-3 mb-6 flex-grow">
                    {{ $post->excerpt ?: str($post->body)->limit(120) }}
                </p>
                
                <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center gap-2 text-secondary font-h3 text-sm group/link">
                    Read Article 
                    <span class="material-symbols-outlined text-[18px] transition-transform duration-300 group-hover/link:translate-x-1">arrow_forward</span>
                </a>
            </div>
        </article>
        @empty
        <div class="col-span-full py-20 text-center text-on-surface-variant">
            <span class="material-symbols-outlined text-6xl mb-4 opacity-20">search_off</span>
            <p class="font-h2">No articles found yet.</p>
        </div>
        @endforelse
    </section>

    <!-- Pagination -->
    <div class="mt-12">
        {{ $posts->links() }}
    </div>

    <!-- CTA Section -->
    <section class="mt-24 relative overflow-hidden rounded-3xl bg-surface-container-low border border-outline-variant/30 p-8 md:p-14 text-center" data-reveal="fade-up">
        <div class="max-w-2xl mx-auto space-y-6">
            <h2 class="font-h1 text-h1 text-on-surface">Need a Calculation?</h2>
            <p class="text-on-surface-variant font-body-lg text-body-lg leading-relaxed">
                While you're here, try our precision age calculator. It's free, private, and works on any device.
            </p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('age-calculator') }}" class="inline-flex items-center gap-2 bg-secondary text-on-secondary px-8 py-4 rounded-2xl font-h2 text-h2 hover:bg-secondary-container transition-all duration-300 shadow-lg hover:-translate-y-0.5">
                    <span class="material-symbols-outlined">calculate</span>
                    Try Age Calculator
                </a>
            </div>
        </div>
    </section>
@endsection

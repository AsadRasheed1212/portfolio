@extends('layouts.app')
@section('title', $work->title . ' — Portfolio')
@section('content')
<section class="py-36">
<div class="max-w-[900px] mx-auto px-10">
    <div class="mb-6 rv">
        <a href="{{ route('works') }}" class="text-mid text-sm hover:text-primary transition-colors flex items-center gap-2">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            Back to Works
        </a>
    </div>
    <div class="rv">
        <div class="text-[11px] tracking-[2px] uppercase text-primary font-medium mb-3">{{ $work->category }}</div>
        <h1 class="font-slab text-[clamp(32px,5vw,56px)] font-medium text-white leading-[1.1] mb-6">{{ $work->title }}</h1>
    </div>
    @if($work->thumbnail)
    <div class="aspect-video bg-dark rounded-sm overflow-hidden mb-10 rv">
        <img src="{{ asset('storage/'.$work->thumbnail) }}" alt="{{ $work->title }}" class="w-full h-full object-cover">
    </div>
    @endif
    <div class="rv">
        <p class="text-mid text-[17px] leading-[1.9] mb-8">{{ $work->description }}</p>
        @if($work->tech_stack)
        <div class="flex flex-wrap gap-2.5 mb-8">
            @foreach($work->tech_stack as $tech)
            <span class="stag">{{ $tech }}</span>
            @endforeach
        </div>
        @endif
        @if($work->url)
        <a href="{{ $work->url }}" target="_blank" rel="noopener" class="btn btn-primary">
            Visit Project ↗
        </a>
        @endif
    </div>
</div>
</section>
@endsection

@extends('layouts.app')
@section('title','About — Portfolio')
@section('content')
<section class="py-36">
<div class="max-w-[1200px] mx-auto px-10">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center mb-24">
        {{-- Image side --}}
        <div class="rv-l relative">
            <div class="aspect-[4/5] bg-card border border-white/[0.07] rounded-sm overflow-hidden relative flex items-center justify-center">
                <img src="{{ asset('assets/portfolio.jpg') }}" alt="My photo" class="w-full h-full object-cover">
            </div>
            <div class="absolute -bottom-5 -right-5 w-36 h-36 border border-primary/30 rounded-sm"></div>
        </div>

        {{-- Text side --}}
        <div class="rv-r">
            <div class="eyebrow">Who I Am</div>
            <h2 class="font-slab text-[40px] font-medium text-white mb-5 leading-[1.2]">
                Passionate Developer<br>Based in Karachi
            </h2>
            <p class="text-mid leading-[1.9] mb-4">
                I am an Economics graduate with strong expertise in Data Entry, MS Excel, WordPress website management, and PHP Laravel. I also do video editing for reels, ads, and social content. I handle website content management, product listing, data organization, and administrative tasks with attention to detail.
            </p>
            <p class="text-mid leading-[1.9] mb-8">
                From designing pixel-perfect interfaces to architecting robust backend systems — I handle the complete development cycle.
            </p>

            <div class="flex flex-wrap gap-2.5 mb-8">
                @foreach($skills as $skill)
                <span class="stag">{{ $skill }}</span>
                @endforeach
            </div>

            <a href="{{ route('contact') }}" class="btn btn-primary">
                Hire Me
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>

    {{-- Skills bars --}}
    <div class="rv">
        <div class="eyebrow">Tech Stack</div>
        <h3 class="font-slab text-3xl font-medium text-white mb-10">My Skills</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-7">
            @foreach([
                ['PHP / Laravel',90],['WordPress CMS',88],
                ['MS Excel',92],['MS Word',90],
                ['MySQL / Database',82],['Data Entry',95],
                ['Video Editing',80],['HTML / CSS',78],
            ] as [$name,$pct])
            <div>
                <div class="flex justify-between mb-2">
                    <span class="text-white text-sm font-medium">{{ $name }}</span>
                    <span class="text-primary text-[13px]">{{ $pct }}%</span>
                </div>
                <div class="h-[3px] bg-primary/10 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-primary to-accent rounded-full w-0"
                         data-skill data-w="{{ $pct }}%"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
</section>
@endsection
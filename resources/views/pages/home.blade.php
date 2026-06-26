@extends('layouts.app')
@section('title','Home — Portfolio')
@section('content')

{{-- ══ HERO ══ --}}
<section class="min-h-screen flex items-center pt-36 pb-20 px-0">
<div class="max-w-[1200px] mx-auto px-10 grid grid-cols-1 lg:grid-cols-2 gap-20 items-center w-full">

    {{-- Left --}}
    <div>
        <div class="h-eye flex items-center gap-3 mb-7 opacity-0">
            <div class="w-10 h-px bg-primary"></div>
            <span class="text-[11px] tracking-[3px] uppercase text-primary font-medium">Available for work</span>
        </div>

        <h1 class="h-title font-slab text-[clamp(44px,6vw,78px)] font-medium leading-[1.07] text-white mb-7 opacity-0">
            <span class="block">Creative</span>
            <span class="block text-primary" id="typed-name">Developer</span>
            <span class="block text-white/90">from Pakistan</span>
        </h1>

        <p class="h-desc text-[17px] text-mid leading-[1.85] mb-12 max-w-[460px] opacity-0">
            I handle
            <span class="text-primary font-medium">Data Entry</span>,
            <span class="text-primary font-medium">MS Excel</span>,
            <span class="text-primary font-medium">WordPress</span>, and
            <span class="text-primary font-medium">PHP Laravel</span> websites — plus
            <span class="text-primary font-medium">video editing</span> for content that pops.
        </p>

        <div class="h-btns flex gap-5 flex-wrap opacity-0">
            <a href="{{ route('works') }}" class="btn btn-primary">
                View My Works
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('contact') }}" class="btn btn-outline">Let's Talk</a>
        </div>
    </div>

    {{-- Right cards --}}
    <div class="h-visual relative h-[500px] hidden lg:block opacity-0">
        <div class="h-blob absolute w-[400px] h-[400px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 animate-morph rounded-[60%_40%_70%_30%/50%_60%_40%_50%]"
             style="background:radial-gradient(circle at 30% 40%,rgba(110,193,228,.12) 0%,transparent 60%),radial-gradient(circle at 70% 70%,rgba(97,206,112,.08) 0%,transparent 60%)"></div>

        <div class="fc-main card absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[260px] p-5 text-center">
            <div class="w-20 h-20 rounded-full bg-gradient-to-br from-primary to-accent mx-auto mb-4 flex items-center justify-center font-slab text-3xl font-semibold text-darker">
                PK
            </div>
            <h3 class="text-white text-base font-medium mb-1">Muhammad Asad</h3>
            <p class="text-mid text-[13px]">Full-Stack Developer</p>
        </div>

        <div class="fc-stat1 card absolute top-[8%] right-0 p-4 min-w-[140px]">
            <span class="font-slab text-[34px] font-medium text-primary block leading-none" data-count="5" data-suf="+">1+</span>
            <span class="text-[12px] text-mid mt-1 block tracking-wide">Years Exp.</span>
        </div>

        <div class="fc-stat2 card absolute bottom-[8%] left-0 p-4 min-w-[140px]">
            <span class="font-slab text-[34px] font-medium text-primary block leading-none" data-count="50" data-suf="+">05+</span>
            <span class="text-[12px] text-mid mt-1 block tracking-wide">Projects Done</span>
        </div>
    </div>
</div>
</section>

<div class="sec-div"></div>

{{-- ══ SERVICES ══ --}}
<section class="py-32">
<div class="max-w-[1200px] mx-auto px-10">
    <div class="text-center mb-16 rv">
        <div class="eyebrow">What I Do</div>
        <h2 class="font-slab text-[clamp(32px,4vw,52px)] font-medium text-white leading-[1.15] mb-4">Services I Offer</h2>
        <p class="text-mid max-w-[560px] mx-auto text-[16px]">From concept to deployment — full lifecycle of your digital product.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach([
            ['📊','Data Entry & Excel','Accurate data entry, MS Excel reports, and structured data management.'],
            ['⚡','Laravel Development','PHP Laravel websites with clean structure and reliable MySQL backend.'],
            ['📝','WordPress Management','Page builds, content updates, and full WordPress site maintenance.'],
            ['🎬','Video Editing','Reels, ads, intros, and full edits with motion graphics and color grading.'],
            ['🛒','E-Commerce Operations','Product listing, store management, and online catalog organization.'],
            ['🗄️','Database Design','Efficient MySQL schemas and structured data for web applications.'],
            ['💼','Administrative Support','Email communication, internet research, and office administration tasks.'],
            ['🚀','Performance','Caching, CDN, server tuning — blazing fast load times.'],
        ] as $i => [$icon,$title,$desc])
        <div class="svc-card">
            <span class="absolute top-6 right-6 font-slab text-5xl font-medium text-primary/[0.04] leading-none select-none">0{{ $i+1 }}</span>
            <div class="w-[52px] h-[52px] bg-primary/[0.07] border border-primary/15 rounded-sm flex items-center justify-center text-2xl mb-6">{{ $icon }}</div>
            <h3 class="font-slab text-xl font-medium text-white mb-3">{{ $title }}</h3>
            <p class="text-mid text-[15px] leading-[1.8]">{{ $desc }}</p>
        </div>
        @endforeach
    </div>
</div>
</section>

<div class="sec-div"></div>

{{-- ══ WORKS ══ --}}
<section class="py-32">
<div class="max-w-[1200px] mx-auto px-10">
    <div class="text-center mb-16 rv">
        <div class="eyebrow">Portfolio</div>
        <h2 class="font-slab text-[clamp(32px,4vw,52px)] font-medium text-white leading-[1.15] mb-4">Selected Works</h2>
        <p class="text-mid max-w-[560px] mx-auto">Projects I'm proud of — updated regularly.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($works as $work)
        <div class="work-card">
            <div class="relative aspect-video bg-dark overflow-hidden">
                @if($work->thumbnail)
                    <img src="{{ asset('storage/'.$work->thumbnail) }}" alt="{{ $work->title }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center text-5xl text-white/10">🖥️</div>
                @endif
                <div class="work-overlay">
                    <a href="{{ route('work.detail',$work->id) }}" class="work-btn">VIEW PROJECT</a>
                </div>
            </div>
            <div class="p-6">
                <div class="text-[11px] tracking-[2px] uppercase text-primary font-medium mb-2">{{ $work->category }}</div>
                <h3 class="font-slab text-xl font-medium text-white mb-2">{{ $work->title }}</h3>
                <p class="text-sm text-mid">{{ Str::limit($work->description,100) }}</p>
            </div>
        </div>
        @empty
        <div class="col-span-2 text-center py-20 text-mid">
            <p class="text-4xl mb-4 opacity-20">🖥️</p>
            <p>No projects yet. Add from database seeder.</p>
        </div>
        @endforelse
    </div>
    <div class="text-center mt-12 rv">
        <a href="{{ route('works') }}" class="btn btn-outline">View All Projects</a>
    </div>
</div>
</section>

{{-- ══ STATS ══ --}}
<section class="py-24 border-y border-white/[0.07]">
<div class="max-w-[1200px] mx-auto px-10">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-px bg-white/[0.07]">
        @foreach([
            ['05','+ Projects','Completed'],
            ['5','+ Years','Experience'],
            ['04','+ Clients','Happy'],
            ['100','%','Dedication'],
        ] as [$n,$suf,$lbl])
        <div class="bg-card py-10 text-center px-4">
            <span class="font-slab text-[52px] font-medium text-primary leading-none block" data-count="{{ $n }}" data-suf="{{ $suf }}">{{ $n }}{{ $suf }}</span>
            <span class="text-sm text-mid mt-1 block tracking-wide">{{ $lbl }}</span>
        </div>
        @endforeach
    </div>
</div>
</section>

@endsection
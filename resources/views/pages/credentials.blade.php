@extends('layouts.app')
@section('title','Credentials — Portfolio')
@section('content')
<section class="py-36">
<div class="max-w-[1200px] mx-auto px-10">
    <div class="text-center mb-16 rv">
        <div class="eyebrow">My Background</div>
        <h2 class="font-slab text-[clamp(32px,4vw,52px)] font-medium text-white leading-[1.15] mb-4">Credentials</h2>
        <p class="text-mid max-w-[560px] mx-auto">Experience, education, and achievements.</p>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-px bg-white/[0.07] mb-16 rv">
        @foreach([['50','+','Projects'],['5','+','Years Exp.'],['30','+','Clients'],['15','+','Awards']] as [$n,$suf,$lbl])
        <div class="bg-card py-10 text-center px-4">
            <span class="font-slab text-[52px] font-medium text-primary leading-none block" data-count="{{ $n }}" data-suf="{{ $suf }}">{{ $n }}{{ $suf }}</span>
            <span class="text-sm text-mid mt-1 block">{{ $lbl }}</span>
        </div>
        @endforeach
    </div>

    {{-- CV Download --}}
    <div class="card p-8 mb-20 rv flex flex-col sm:flex-row items-center justify-between gap-6">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-primary/[0.07] border border-primary/15 rounded-sm flex items-center justify-center text-2xl flex-shrink-0">📄</div>
            <div>
                <h3 class="font-slab text-lg font-medium text-white mb-1">My Resume / CV</h3>
                <p class="text-mid text-sm">Muhammad Asad Rasheed — full background &amp; skills.</p>
            </div>
        </div>
        <div class="flex gap-3 flex-shrink-0">
            <a href="{{ asset('cv/Muhammad_Asad_Rasheed_CV.pdf') }}" target="_blank" rel="noopener" class="btn btn-outline">
                View CV
            </a>
            <a href="{{ asset('cv/Muhammad_Asad_Rasheed_CV.pdf') }}" download class="btn btn-primary">
                Download CV
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M7 10l5 5 5-5M12 15V3"/></svg>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
        {{-- Timeline --}}
        <div>
            <h3 class="font-slab text-2xl font-medium text-white mb-8 rv">Experience & Education</h3>
            <div class="tl-wrap">
                @foreach($credentials as $cred)
                <div class="relative mb-10 rv">
                    <div class="tl-dot"></div>
                    <div class="text-[11px] tracking-[2px] uppercase text-primary font-medium mb-1">{{ $cred->year }}</div>
                    <div class="font-slab text-lg font-medium text-white mb-1">{{ $cred->title }}</div>
                    <div class="text-mid text-sm mb-2">{{ $cred->organization }}</div>
                    @if($cred->description)
                    <div class="text-mid text-[14px] leading-[1.8]">{{ $cred->description }}</div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>

        {{-- Skill bars --}}
        <div>
            <h3 class="font-slab text-2xl font-medium text-white mb-8 rv">Technical Skills</h3>
            <div class="space-y-6">
                @foreach([
                    ['PHP / Laravel',90],['WordPress',88],
                    ['MS Excel',92],['MySQL / Database',82],
                    ['Video Editing',80],['Data Entry',95],
                    ['HTML / CSS',78],
                ] as [$name,$pct])
                <div class="rv">
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

    {{-- Certificates --}}
    <div class="mt-24">
        <h3 class="font-slab text-2xl font-medium text-white mb-3 rv">Certificates</h3>
        <p class="text-mid text-sm mb-10 rv">Aptech Learning — earned credentials and workshop participation.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['file'=>'cert-diploma-software-engineering.jpg','title'=>'Advanced Diploma in Software Engineering','org'=>'Aptech Computer Education','year'=>'2024'],
                ['file'=>'cert-technology-contest.jpg','title'=>'Technology Contest 2021','org'=>'Aptech Learning','year'=>'2021'],
                ['file'=>'cert-iot-workshop.jpg','title'=>'IOT Workshop','org'=>'Aptech Learning','year'=>'2021'],
                ['file'=>'cert-no-code-tools.jpg','title'=>'No Code Development Tools','org'=>'Aptech Learning','year'=>'2021'],
            ] as $cert)
            <div class="work-card rv">
                <div class="relative aspect-[3/4] bg-dark overflow-hidden">
                    <img src="{{ asset('certificates/'.$cert['file']) }}" alt="{{ $cert['title'] }}" class="w-full h-full object-cover">
                    <div class="work-overlay">
                        <a href="{{ asset('certificates/'.$cert['file']) }}" target="_blank" rel="noopener" class="work-btn">VIEW FULL</a>
                    </div>
                </div>
                <div class="p-5">
                    <div class="text-[11px] tracking-[2px] uppercase text-primary font-medium mb-2">{{ $cert['year'] }}</div>
                    <h4 class="font-slab text-base font-medium text-white mb-1 leading-snug">{{ $cert['title'] }}</h4>
                    <p class="text-mid text-xs mb-4">{{ $cert['org'] }}</p>
                    <a href="{{ asset('certificates/'.$cert['file']) }}" download class="text-primary text-xs font-medium inline-flex items-center gap-1.5 hover:underline">
                        Download
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M7 10l5 5 5-5M12 15V3"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</section>
@endsection
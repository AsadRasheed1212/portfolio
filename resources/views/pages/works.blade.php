@extends('layouts.app')
@section('title','Works — Portfolio')
@section('content')
<section class="py-36">
<div class="max-w-[1200px] mx-auto px-10">
    <div class="text-center mb-16 rv">
        <div class="eyebrow">Portfolio</div>
        <h2 class="font-slab text-[clamp(32px,4vw,52px)] font-medium text-white leading-[1.15] mb-4">All Projects</h2>
        <p class="text-mid max-w-[560px] mx-auto">Every project built with purpose and precision.</p>
    </div>

    {{-- Filter --}}
    @if($categories->count() > 0)
    <div class="flex gap-3 flex-wrap mb-12 rv">
        <button onclick="filterWork('all')" class="btn btn-primary text-xs py-2 px-5 filter-btn active-filter" data-cat="all">All</button>
        @foreach($categories as $cat)
        <button onclick="filterWork('{{ Str::slug($cat) }}')" class="btn btn-outline text-xs py-2 px-5 filter-btn" data-cat="{{ Str::slug($cat) }}">{{ $cat }}</button>
        @endforeach
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="works-grid">
        @forelse($works as $work)
        <div class="work-card" data-cat="{{ Str::slug($work->category) }}">
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
                <p class="text-sm text-mid mb-4">{{ Str::limit($work->description,100) }}</p>
                @if($work->tech_stack)
                <div class="flex flex-wrap gap-2">
                    @foreach($work->tech_stack as $tech)
                    <span class="text-[11px] bg-white/[0.05] border border-white/[0.07] text-mid px-3 py-1 rounded-sm">{{ $tech }}</span>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        @empty
        <div class="col-span-2 text-center py-20 text-mid opacity-50">No projects yet.</div>
        @endforelse
    </div>
</div>
</section>
@endsection

@push('scripts')
<script>
function filterWork(cat){
    document.querySelectorAll('.work-card').forEach(el=>{
        const show = cat==='all' || el.dataset.cat===cat
        el.style.display = show ? '' : 'none'
    })
    document.querySelectorAll('.filter-btn').forEach(b=>{
        b.classList.toggle('btn-primary', b.dataset.cat===cat)
        b.classList.toggle('btn-outline',  b.dataset.cat!==cat)
    })
}
</script>
@endpush
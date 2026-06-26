@extends('layouts.app')
@section('title','Contact — Portfolio')
@section('content')
<section class="py-36">
<div class="max-w-[1200px] mx-auto px-10">
    <div class="text-center mb-16 rv">
        <div class="eyebrow">Get In Touch</div>
        <h2 class="font-slab text-[clamp(32px,4vw,52px)] font-medium text-white leading-[1.15] mb-4">Let's Work Together</h2>
        <p class="text-mid max-w-[560px] mx-auto">Have a project? Let's make something great.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.5fr] gap-20 items-start">

        {{-- Info --}}
        <div class="rv-l">
            <h2 class="font-slab text-[38px] font-medium text-white mb-5 leading-[1.2]">Ready to start your project?</h2>
            <p class="text-mid leading-[1.9] mb-10">Whether you need a complete web app, landing page, or API — I'm here to bring your vision to life.</p>

            @foreach([['📍','Location','Karachi, Pakistan'],['📧','Email','asadrasheed8787@gmail.com'],['📱','WhatsApp','+92 316 2432479']] as [$icon,$lbl,$val])
            <div class="flex items-center gap-4 mb-5">
                <div class="w-11 h-11 bg-primary/[0.07] border border-primary/15 rounded-sm flex items-center justify-center text-lg flex-shrink-0">{{ $icon }}</div>
                <div>
                    <strong class="block text-white font-medium text-sm">{{ $lbl }}</strong>
                    <span class="text-mid text-sm">{{ $val }}</span>
                </div>
            </div>
            @endforeach

            <div class="mt-9">
                <a href="https://wa.me/923162432749?text=Hello!%20I%20visited%20your%20portfolio%20and%20want%20to%20discuss%20a%20project."
                   target="_blank" rel="noopener" class="btn btn-wa gap-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="18" height="18">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                    Chat on WhatsApp
                </a>
            </div>
        </div>

        {{-- Form --}}
        <div class="rv-r">
            <form id="cform">
                <div class="grid grid-cols-2 gap-4 mb-5">
                    <div><label class="f-label">Your Name</label><input type="text" name="name" class="f-input" placeholder="Your Name" required></div>
                    <div><label class="f-label">Email</label><input type="email" name="email" class="f-input" placeholder="you@example.com" required></div>
                </div>
                <div class="mb-5"><label class="f-label">Subject</label><input type="text" name="subject" class="f-input" placeholder="Project inquiry"></div>
                <div class="mb-5"><label class="f-label">Message</label><textarea name="message" class="f-input h-36 resize-y" placeholder="Tell me about your project..." required></textarea></div>
                <button type="submit" class="btn btn-primary form-submit w-full justify-center py-4 tracking-widest uppercase text-sm">
                    Send Message
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
                </button>
                <div id="fsuccess" class="hidden mt-4 text-center py-4 px-5 bg-accent/[0.08] border border-accent/20 rounded-sm text-accent text-sm">
                    ✅ Message sent! I'll reply within 24 hours.
                </div>
            </form>
        </div>
    </div>
</div>
</section>
@endsection
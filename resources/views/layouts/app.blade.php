<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- SEO --}}
<title>{{ $title ?? 'Portfolio — Full-Stack Web Developer' }}</title>
<meta name="description" content="{{ $description ?? 'Full-stack web developer specializing in Laravel, MySQL, and modern frontend development. View my portfolio of projects.' }}">
<meta name="keywords" content="web developer, laravel developer, portfolio, full stack developer, karachi">
<meta name="author" content="Portfolio">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ url()->current() }}">

{{-- Open Graph --}}
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $title ?? 'Portfolio — Full-Stack Web Developer' }}">
<meta property="og:description" content="{{ $description ?? 'Full-stack web developer specializing in Laravel, MySQL, and modern frontend development.' }}">
<meta property="og:url" content="{{ url()->current() }}">

{{-- Favicon --}}
<link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🚀</text></svg>">

{{-- Production build via Vite + Tailwind PostCSS --}}
@vite(['resources/css/app.css', 'resources/js/app.js'])

{{-- GSAP CDN --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script>
/* SAFETY NET: if GSAP/CDN fails to load (slow net, blocked CDN),
   force-remove loader and force-show all hidden elements after 4s
   so the page is never stuck blank. */
window.addEventListener('load', function () {
    setTimeout(function () {
        if (typeof gsap === 'undefined') {
            console.warn('GSAP failed to load from CDN — showing fallback content without animations.');
            var loader = document.getElementById('loader');
            if (loader) loader.style.display = 'none';
            document.querySelectorAll('.h-eye,.h-title,.h-desc,.h-btns,.h-visual,.rv,.rv-l,.rv-r,.rv-s,.ll')
                .forEach(function (el) {
                    el.style.opacity = '1';
                    el.style.transform = 'none';
                });
        }
    }, 4000);
});
</script>
</head>
<body>

{{-- Particles --}}
<div id="particles-bg"></div>

{{-- Cursor --}}
<div class="cursor-ring hidden md:block" id="cursor-ring"></div>
<div class="cursor-dot hidden md:block" id="cursor-dot"></div>

{{-- Loader --}}
<div id="loader" style="position:fixed;inset:0;background:#0D0D0D;display:flex;flex-direction:column;align-items:center;justify-content:center;z-index:9998;gap:24px;">
    <div style="display:flex;gap:4px;font-family:'Roboto Slab',serif;font-size:32px;font-weight:500;letter-spacing:10px;color:#6EC1E4;">
        @foreach(str_split('LOADING') as $l)
        <span class="ll">{{ $l }}</span>
        @endforeach
    </div>
    <div style="width:200px;height:2px;background:rgba(110,193,228,.1);border-radius:2px;overflow:hidden;">
        <div id="lbar" style="height:100%;width:0;background:linear-gradient(90deg,#6EC1E4,#61CE70);"></div>
    </div>
</div>

{{-- NAV --}}
<nav id="mnav" style="position:fixed;top:0;left:0;right:0;z-index:100;padding:20px 0;transition:all .3s;">
    <div style="max-width:1200px;margin:0 auto;padding:0 24px;display:flex;align-items:center;justify-content:space-between;">
        <a href="{{ route('home') }}" style="display:flex;align-items:center;gap:6px;flex-shrink:0;">
            <span style="font-family:Georgia,serif;font-size:20px;font-weight:500;color:#fff;">Portfolio</span>
            <span style="width:8px;height:8px;background:#6EC1E4;border-radius:50%;animation:pulse2 2s infinite;display:block;"></span>
        </a>
        <div id="nlks" class="nav-links-desktop">
            <a href="{{ route('home') }}"        class="nav-link {{ request()->routeIs('home')        ? 'active':'' }}">Home</a>
            <a href="{{ route('about') }}"       class="nav-link {{ request()->routeIs('about')       ? 'active':'' }}">About</a>
            <a href="{{ route('service') }}"     class="nav-link {{ request()->routeIs('service')     ? 'active':'' }}">Services</a>
            <a href="{{ route('works') }}"       class="nav-link {{ request()->routeIs('works')       ? 'active':'' }}">Works</a>
            <a href="{{ route('credentials') }}" class="nav-link {{ request()->routeIs('credentials') ? 'active':'' }}">Credentials</a>
            <a href="{{ route('contact') }}"
               style="border:1px solid #6EC1E4;color:#6EC1E4;padding:8px 22px;border-radius:2px;font-size:14px;font-weight:500;transition:all .3s;white-space:nowrap;"
               onmouseover="this.style.background='#6EC1E4';this.style.color='#0D0D0D'"
               onmouseout="this.style.background='transparent';this.style.color='#6EC1E4'">
                Contact
            </a>
        </div>
        <button id="ntog" onclick="toggleMenu()" class="nav-toggle-btn" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</nav>

{{-- Responsive nav styles --}}
<style>
.nav-links-desktop{display:flex;align-items:center;gap:28px;}
.nav-toggle-btn{display:none;flex-direction:column;gap:5px;background:transparent;border:none;cursor:pointer;padding:8px;}
.nav-toggle-btn span{width:24px;height:1.5px;background:#fff;display:block;transition:all .3s;}

@media(max-width:920px){
    .nav-links-desktop{
        display:none;
        position:fixed;inset:0;background:#0D0D0D;
        flex-direction:column;align-items:center;justify-content:center;gap:28px;
        z-index:50;
    }
    .nav-links-desktop.open{display:flex;}
    .nav-links-desktop .nav-link{font-size:20px;}
    .nav-toggle-btn{display:flex;}
    .cursor-ring,.cursor-dot{display:none!important;}
}
@media(max-width:480px){
    #mnav > div{padding:0 16px;}
}
</style>

{{-- CONTENT --}}
<main style="position:relative;z-index:1;">
    @yield('content')
</main>

{{-- FOOTER --}}
<footer style="position:relative;z-index:1;background:#0F0F0F;border-top:1px solid rgba(255,255,255,.07);padding:56px 0 28px;">
    <div style="max-width:1200px;margin:0 auto;padding:0 24px;">
        <div class="footer-grid">
            <div>
                <h3 style="font-family:Georgia,serif;font-size:20px;font-weight:500;color:#fff;margin-bottom:12px;">Portfolio</h3>
                <p style="color:#9F9F9F;font-size:14px;line-height:1.8;max-width:280px;">Building fast, beautiful, and accessible digital experiences.</p>
            </div>
            <div>
                <h4 style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:#6EC1E4;font-weight:500;margin-bottom:18px;">Pages</h4>
                <div style="display:flex;flex-direction:column;gap:10px;">
                    @foreach(['about'=>'About','service'=>'Services','works'=>'Works','credentials'=>'Credentials','contact'=>'Contact'] as $r=>$l)
                    <a href="{{ route($r) }}" style="color:#9F9F9F;font-size:14px;transition:color .3s;" onmouseover="this.style.color='#6EC1E4'" onmouseout="this.style.color='#9F9F9F'">{{ $l }}</a>
                    @endforeach
                </div>
            </div>
            <div>
                <h4 style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:#6EC1E4;font-weight:500;margin-bottom:18px;">Contact</h4>
                <div style="display:flex;flex-direction:column;gap:8px;color:#9F9F9F;font-size:14px;">
                    <p>+92 316 2432749</p>
                    <p>hello@portfolio.com</p>
                    <p>Karachi, Pakistan</p>
                </div>
                <div style="display:flex;gap:12px;margin-top:18px;">
                    {{-- LinkedIn --}}
                    <a href="https://www.linkedin.com/in/asad-rasheed-731685263/" target="_blank" rel="noopener" aria-label="LinkedIn"
                       style="display:flex;align-items:center;justify-content:center;width:38px;height:38px;border:1px solid rgba(255,255,255,.12);border-radius:4px;color:#9F9F9F;transition:all .3s;"
                       onmouseover="this.style.borderColor='#0A66C2';this.style.color='#0A66C2';this.style.background='rgba(10,102,194,0.08)'"
                       onmouseout="this.style.borderColor='rgba(255,255,255,.12)';this.style.color='#9F9F9F';this.style.background='transparent'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                    {{-- GitHub --}}
                    <a href="https://github.com/AsadRasheed1212" target="_blank" rel="noopener" aria-label="GitHub"
                       style="display:flex;align-items:center;justify-content:center;width:38px;height:38px;border:1px solid rgba(255,255,255,.12);border-radius:4px;color:#9F9F9F;transition:all .3s;"
                       onmouseover="this.style.borderColor='#fff';this.style.color='#fff';this.style.background='rgba(255,255,255,0.06)'"
                       onmouseout="this.style.borderColor='rgba(255,255,255,.12)';this.style.color='#9F9F9F';this.style.background='transparent'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div style="border-top:1px solid rgba(255,255,255,.07);padding-top:22px;text-align:center;">
            <p style="color:rgba(188,188,188,.35);font-size:13px;">All rights reserved &copy; {{ date('Y') }} Portfolio</p>
        </div>
    </div>
</footer>

<style>
.footer-grid{display:grid;grid-template-columns:2fr 1fr 1fr;gap:48px;margin-bottom:40px;}
@media(max-width:768px){
    .footer-grid{grid-template-columns:1fr 1fr;gap:32px;}
}
@media(max-width:480px){
    .footer-grid{grid-template-columns:1fr;gap:28px;}
}
</style>

{{-- WHATSAPP FLOAT --}}
<a href="https://wa.me/923162432749?text=Hello!%20I%20visited%20your%20portfolio%20and%20would%20like%20to%20connect."
   class="wa-float" id="wa-float" target="_blank" rel="noopener" aria-label="WhatsApp">
    <div style="position:relative;">
        <div class="wa-ring"></div>
        <div class="wa-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="26" height="26">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
            </svg>
        </div>
    </div>
    <span class="wa-label">Chat with me!</span>
</a>

{{-- MAIN JS (no imports — CDN already loaded) --}}
<script>
gsap.registerPlugin(ScrollTrigger);

/* PARTICLES */
(function(){
    var bg=document.getElementById('particles-bg');
    if(!bg)return;
    var c=document.createElement('canvas');
    c.style.cssText='width:100%;height:100%;position:absolute;top:0;left:0';
    bg.appendChild(c);
    var ctx=c.getContext('2d');
    var W=c.width=innerWidth,H=c.height=innerHeight;
    var COLS=['rgba(110,193,228,','rgba(97,206,112,','rgba(255,255,255,'];
    var N=Math.min(80,Math.floor(W/18));
    function mkP(){return{x:Math.random()*W,y:Math.random()*H,r:Math.random()*1.8+.4,vx:(Math.random()-.5)*.4,vy:(Math.random()-.5)*.4,o:Math.random()*.5+.1,col:COLS[Math.floor(Math.random()*COLS.length)]};}
    var pts=[];for(var i=0;i<N;i++)pts.push(mkP());
    function draw(){
        ctx.clearRect(0,0,W,H);
        pts.forEach(function(p){
            p.x+=p.vx;p.y+=p.vy;
            if(p.x<0||p.x>W||p.y<0||p.y>H){var n=mkP();p.x=n.x;p.y=n.y;}
            ctx.beginPath();ctx.arc(p.x,p.y,p.r,0,Math.PI*2);
            ctx.fillStyle=p.col+p.o+')';ctx.fill();
        });
        for(var i=0;i<pts.length;i++)for(var j=i+1;j<pts.length;j++){
            var dx=pts[i].x-pts[j].x,dy=pts[i].y-pts[j].y,d=Math.sqrt(dx*dx+dy*dy);
            if(d<130){ctx.beginPath();ctx.strokeStyle='rgba(110,193,228,'+(0.06*(1-d/130))+')';ctx.lineWidth=.5;ctx.moveTo(pts[i].x,pts[i].y);ctx.lineTo(pts[j].x,pts[j].y);ctx.stroke();}
        }
        requestAnimationFrame(draw);
    }
    draw();
    window.addEventListener('resize',function(){W=c.width=innerWidth;H=c.height=innerHeight;});
})();

/* LOADER */
(function(){
    var bar=document.getElementById('lbar');
    var lts=document.querySelectorAll('.ll');
    gsap.to(lts,{opacity:1,y:0,duration:.5,stagger:.08,ease:'back.out(2)'});
    var p=0,iv=setInterval(function(){
        p+=Math.random()*14;
        if(p>=100){p=100;clearInterval(iv);
            setTimeout(function(){
                gsap.to('#loader',{yPercent:-100,duration:.9,ease:'power3.inOut',onComplete:function(){
                    document.getElementById('loader').style.display='none';
                    initHero();
                }});
            },250);
        }
        if(bar)bar.style.width=p+'%';
    },55);

    /* HARD BACKUP: force-hide loader after 5s no matter what */
    setTimeout(function(){
        var loader=document.getElementById('loader');
        if(loader && loader.style.display!=='none'){
            loader.style.display='none';
            document.querySelectorAll('.h-eye,.h-title,.h-desc,.h-btns,.h-visual,.rv,.rv-l,.rv-r,.rv-s')
                .forEach(function(el){el.style.opacity='1';el.style.transform='none';});
        }
    },5000);
})();

/* HERO */
function initHero(){
    if(document.querySelector('.h-title')){
        var tl=gsap.timeline();
        tl.to('.h-eye',  {opacity:1,y:0,duration:.7,ease:'power3.out'})
          .to('.h-title',{opacity:1,y:0,duration:.8,ease:'power3.out'},'-=.4')
          .to('.h-desc', {opacity:1,y:0,duration:.7,ease:'power3.out'},'-=.5')
          .to('.h-btns', {opacity:1,y:0,duration:.6,ease:'power3.out'},'-=.4')
          .to('.h-visual',{opacity:1,x:0,duration:.9,ease:'power3.out'},'-=.6');
    }
    if(document.querySelector('.fc-main'))  gsap.to('.fc-main', {y:-14,duration:2.6,ease:'sine.inOut',yoyo:true,repeat:-1});
    if(document.querySelector('.fc-stat1')) gsap.to('.fc-stat1',{y:-9, duration:3.1,ease:'sine.inOut',yoyo:true,repeat:-1,delay:.6});
    if(document.querySelector('.fc-stat2')) gsap.to('.fc-stat2',{y:-11,duration:2.9,ease:'sine.inOut',yoyo:true,repeat:-1,delay:1.1});
    /* typed effect */
    var el=document.getElementById('typed-name');
    if(el){
        var words=['Developer','Designer','Problem Solver'],i=0;
        function cycle(){gsap.to(el,{opacity:0,duration:.3,onComplete:function(){el.textContent=words[i++%words.length];gsap.to(el,{opacity:1,duration:.4});setTimeout(cycle,2400);}});}
        setTimeout(cycle,2600);
    }
    /* WA entry */
    gsap.from('#wa-float',{scale:0,opacity:0,duration:.7,ease:'back.out(2)',delay:2.2});
}

/* SCROLL REVEALS */
setTimeout(function(){
    ['.rv','.rv-l','.rv-r','.rv-s'].forEach(function(sel){
        var props={opacity:1};
        if(sel==='.rv')props.y=0;
        else if(sel==='.rv-l')props.x=0;
        else if(sel==='.rv-r')props.x=0;
        else props.scale=1;
        gsap.utils.toArray(sel).forEach(function(el,i){
            gsap.to(el,Object.assign({},props,{duration:.85,ease:'power3.out',delay:(i%3)*.1,
                scrollTrigger:{trigger:el,start:'top 86%',toggleActions:'play none none none'}}));
        });
    });
    gsap.utils.toArray('.svc-card').forEach(function(el,i){
        gsap.from(el,{opacity:0,y:50,duration:.7,ease:'power3.out',delay:i*.1,scrollTrigger:{trigger:el,start:'top 88%'}});
    });
    gsap.utils.toArray('.work-card').forEach(function(el,i){
        gsap.from(el,{opacity:0,y:60,duration:.8,ease:'power3.out',delay:i*.13,scrollTrigger:{trigger:el,start:'top 88%'}});
    });
    /* COUNTERS */
    document.querySelectorAll('[data-count]').forEach(function(el){
        var t=parseInt(el.dataset.count),s=el.dataset.suf||'',o={v:0};
        gsap.to(o,{v:t,duration:2.2,ease:'power2.out',scrollTrigger:{trigger:el,start:'top 85%',once:true},
            onUpdate:function(){el.textContent=Math.round(o.v)+s;}});
    });
    /* SKILL BARS */
    var obs=new IntersectionObserver(function(entries){
        entries.forEach(function(e){
            if(e.isIntersecting){gsap.to(e.target,{width:e.target.dataset.w,duration:1.4,ease:'power2.out',delay:.15});obs.unobserve(e.target);}
        });
    },{threshold:.3});
    document.querySelectorAll('[data-skill]').forEach(function(el){obs.observe(el);});
},500);

/* CURSOR */
(function(){
    if(innerWidth<=768)return;
    var ring=document.getElementById('cursor-ring'),dot=document.getElementById('cursor-dot');
    if(!ring||!dot)return;
    var mx=0,my=0,cx=0,cy=0;
    document.addEventListener('mousemove',function(e){mx=e.clientX;my=e.clientY;dot.style.left=mx+'px';dot.style.top=my+'px';});
    (function tick(){cx+=(mx-cx)*.12;cy+=(my-cy)*.12;ring.style.left=cx+'px';ring.style.top=cy+'px';requestAnimationFrame(tick);})();
    document.querySelectorAll('a,button,.svc-card,.work-card').forEach(function(el){
        el.addEventListener('mouseenter',function(){ring.style.width='56px';ring.style.height='56px';ring.style.borderColor='#61CE70';});
        el.addEventListener('mouseleave',function(){ring.style.width='32px';ring.style.height='32px';ring.style.borderColor='#6EC1E4';});
    });
})();

/* NAV SCROLL */
window.addEventListener('scroll',function(){
    var nav=document.getElementById('mnav');
    if(!nav)return;
    if(scrollY>60){nav.style.padding='12px 0';nav.style.background='rgba(13,13,13,.92)';nav.style.backdropFilter='blur(20px)';nav.style.borderBottom='1px solid rgba(255,255,255,.07)';}
    else{nav.style.padding='24px 0';nav.style.background='transparent';nav.style.backdropFilter='none';nav.style.borderBottom='none';}
});

/* MOBILE MENU */
function toggleMenu(){
    var lks=document.getElementById('nlks');
    lks.classList.toggle('open');
}

/* PARALLAX (home page only — guard against missing elements elsewhere) */
document.addEventListener('mousemove',function(e){
    var blob=document.querySelector('.h-blob');
    var card=document.querySelector('.fc-main');
    if(!blob && !card) return;
    var xp=(e.clientX/innerWidth-.5)*22,yp=(e.clientY/innerHeight-.5)*11;
    if(blob) gsap.to(blob,{x:xp*2.2,y:yp*2.2,duration:1.6,ease:'power1.out'});
    if(card) gsap.to(card,{x:xp*.5,y:yp*.5,duration:2,ease:'power1.out'});
});

/* MAGNETIC BUTTONS */
document.querySelectorAll('.btn').forEach(function(btn){
    btn.addEventListener('mousemove',function(e){
        var r=btn.getBoundingClientRect(),x=e.clientX-r.left-r.width/2,y=e.clientY-r.top-r.height/2;
        gsap.to(btn,{x:x*.2,y:y*.2,duration:.3,ease:'power2.out'});
    });
    btn.addEventListener('mouseleave',function(){gsap.to(btn,{x:0,y:0,duration:.5,ease:'elastic.out(1,.5)'}); });
});

/* CONTACT FORM */
var cform=document.getElementById('cform');
if(cform){
    cform.addEventListener('submit',function(e){
        e.preventDefault();
        var btn=cform.querySelector('.form-submit'),orig=btn.textContent;
        btn.textContent='Sending...';btn.disabled=true;
        fetch('/contact',{
            method:'POST',
            headers:{'Content-Type':'application/json','X-CSRF-TOKEN':document.querySelector('meta[name=csrf-token]').content},
            body:JSON.stringify({name:cform.querySelector('[name=name]').value,email:cform.querySelector('[name=email]').value,subject:cform.querySelector('[name=subject]').value,message:cform.querySelector('[name=message]').value})
        }).then(function(r){
            if(r.ok){var s=document.getElementById('fsuccess');if(s){s.style.display='block';gsap.from(s,{opacity:0,y:10,duration:.5});}cform.reset();}
            else{btn.textContent='Error. Try again';}
        }).catch(function(){btn.textContent='Error. Try again';})
        .finally(function(){setTimeout(function(){btn.textContent=orig;btn.disabled=false;},3000);});
    });
}
</script>

@stack('scripts')
</body>
</html>
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
gsap.registerPlugin(ScrollTrigger)

/* ── PARTICLES ── */
function initParticles() {
    const bg = document.getElementById('particles-bg')
    if (!bg) return
    const c = document.createElement('canvas')
    c.style.cssText = 'width:100%;height:100%;position:absolute;top:0;left:0'
    bg.appendChild(c)
    const ctx = c.getContext('2d')
    let W = c.width = innerWidth, H = c.height = innerHeight
    const COLS = ['rgba(110,193,228,','rgba(97,206,112,','rgba(255,255,255,']
    const N = Math.min(90, Math.floor(W / 18))
    class P {
        reset() {
            this.x=Math.random()*W; this.y=Math.random()*H
            this.r=Math.random()*1.8+0.4
            this.vx=(Math.random()-.5)*.4; this.vy=(Math.random()-.5)*.4
            this.o=Math.random()*.5+.1
            this.c=COLS[Math.floor(Math.random()*COLS.length)]
        }
        constructor(){this.reset()}
        update(){
            this.x+=this.vx; this.y+=this.vy
            if(this.x<0||this.x>W||this.y<0||this.y>H) this.reset()
        }
        draw(){
            ctx.beginPath()
            ctx.arc(this.x,this.y,this.r,0,Math.PI*2)
            ctx.fillStyle=this.c+this.o+')'
            ctx.fill()
        }
    }
    const pts = Array.from({length:N},()=>new P())
    function connect(){
        for(let i=0;i<pts.length;i++) for(let j=i+1;j<pts.length;j++){
            const dx=pts[i].x-pts[j].x, dy=pts[i].y-pts[j].y, d=Math.sqrt(dx*dx+dy*dy)
            if(d<140){
                ctx.beginPath()
                ctx.strokeStyle=`rgba(110,193,228,${.07*(1-d/140)})`
                ctx.lineWidth=.5
                ctx.moveTo(pts[i].x,pts[i].y)
                ctx.lineTo(pts[j].x,pts[j].y)
                ctx.stroke()
            }
        }
    }
    ;(function loop(){
        ctx.clearRect(0,0,W,H)
        pts.forEach(p=>{p.update();p.draw()})
        connect()
        requestAnimationFrame(loop)
    })()
    addEventListener('resize',()=>{ W=c.width=innerWidth; H=c.height=innerHeight })
}

/* ── LOADER ── */
function initLoader() {
    const loader = document.getElementById('loader')
    const bar    = document.getElementById('lbar')
    const letters= document.querySelectorAll('.ll')
    gsap.to(letters, { opacity:1, y:0, duration:.5, stagger:.08, ease:'back.out(2)' })
    let p=0
    const iv = setInterval(()=>{
        p += Math.random()*14
        if(p>=100){
            p=100; clearInterval(iv)
            setTimeout(()=>{
                gsap.to(loader,{
                    yPercent:-100, duration:.9, ease:'power3.inOut',
                    onComplete(){ loader.style.display='none'; initHero() }
                })
            }, 250)
        }
        if(bar) bar.style.width=p+'%'
    }, 55)
}

/* ── HERO ── */
function initHero() {
    const tl = gsap.timeline()
    tl.to('.h-eye',    {opacity:1,y:0,duration:.7,ease:'power3.out'})
      .to('.h-title',  {opacity:1,y:0,duration:.8,ease:'power3.out'},'-=.4')
      .to('.h-desc',   {opacity:1,y:0,duration:.7,ease:'power3.out'},'-=.5')
      .to('.h-btns',   {opacity:1,y:0,duration:.6,ease:'power3.out'},'-=.4')
      .to('.h-visual', {opacity:1,x:0,duration:.9,ease:'power3.out'},'-=.6')

    gsap.to('.fc-main',  {y:-14,duration:2.6,ease:'sine.inOut',yoyo:true,repeat:-1})
    gsap.to('.fc-stat1', {y:-9, duration:3.1,ease:'sine.inOut',yoyo:true,repeat:-1,delay:.6})
    gsap.to('.fc-stat2', {y:-11,duration:2.9,ease:'sine.inOut',yoyo:true,repeat:-1,delay:1.1})

    // typed name
    const typed = document.getElementById('typed-name')
    if(typed){
        const names=['Developer','Designer','Problem Solver']
        let i=0
        function cycle(){
            gsap.to(typed,{opacity:0,duration:.3,onComplete(){
                typed.textContent=names[i++ % names.length]
                gsap.to(typed,{opacity:1,duration:.4})
                setTimeout(cycle,2400)
            }})
        }
        setTimeout(cycle,2600)
    }
}